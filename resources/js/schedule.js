axios.defaults.headers.common['X-CSRF-TOKEN'] =
  document.querySelector('meta[name="csrf-token"]').getAttribute('content');

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let calendar;

document.addEventListener("DOMContentLoaded", function () {
    // Pastikan semua elemen ada sebelum melanjutkan
    const calendarEl = document.getElementById("calendar");
    const openModalBtn = document.getElementById("openAddModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const scheduleForm = document.getElementById("schedule-form");
    const searchInput = document.getElementById("search-schedule");
    const filterDate = document.getElementById("filter-date");
    const filterType = document.getElementById("filter-type");
    const toggleCalendarBtn = document.getElementById("toggleCalendarView");
    const toggleListBtn = document.getElementById("toggleListView");

    if (!calendarEl) {
        console.error('Calendar element with id "calendar" not found.');
        return;
    }
    
    // Inisialisasi Kalender
    initCalendar(calendarEl);

    // Tambahkan semua event listener di sini
    if (openModalBtn) {
        openModalBtn.addEventListener("click", () => openAddModal());
    }
    if (closeModalBtn) {
        const modal = document.getElementById("scheduleModal");
        closeModalBtn.addEventListener("click", () => closeModal(modal));
        modal.addEventListener("click", (e) => {
            if (e.target === modal) closeModal(modal);
        });
    }
    document.addEventListener("keydown", (e) => {
        const modal = document.getElementById("scheduleModal");
        if (e.key === "Escape" && modal && !modal.classList.contains("hidden")) {
            closeModal(modal);
        }
    });
    if (scheduleForm) {
        scheduleForm.addEventListener("submit", handleScheduleSubmit);
    }
    if (searchInput) searchInput.addEventListener("input", filterSchedules);
    if (filterDate) filterDate.addEventListener("change", filterSchedules);
    if (filterType) filterType.addEventListener("change", filterSchedules);
    if (toggleCalendarBtn) toggleCalendarBtn.addEventListener("click", toggleCalendarView);
    if (toggleListBtn) toggleListBtn.addEventListener("click", toggleListView);
});

function initCalendar(calendarEl) {
    const events = (window.scheduleData || []).map(schedule => formatEvent(schedule));

    calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        headerToolbar: {
            left: "title",
            center: "dayGridMonth,timeGridWeek,timeGridDay",
            right: "today prev,next",
        },
        height: "auto",
        events: events,
        locale: "id",
        buttonText: { today: "Hari Ini", month: "Bulan", week: "Minggu", day: "Hari" },
        dayMaxEvents: true,
        eventClick: (info) => openEditModal(info.event),
        selectable: true,
        select: (info) => {
            openAddModal(info.start, info.end);
            calendar.unselect();
        },
        editable: true,
        eventDrop: handleEventDrop,
        eventResize: handleEventResize,
    });
    
    calendar.render();
    updateListView(window.scheduleData || []);
}

function formatEvent(schedule) {
    return {
        id: schedule.id,
        title: schedule.title,
        start: schedule.start_time,
        end: schedule.end_time,
        backgroundColor: getColorByType(schedule.type),
        borderColor: getColorByType(schedule.type),
        extendedProps: {
            description: schedule.description || '',
            location: schedule.location || '',
            instructor: schedule.instructor || '',
            type: schedule.type || 'class'
        }
    };
}

function getColorByType(type) {
    const colors = { 'class': '#4F46E5', 'meeting': '#F59E0B', 'personal': '#10B981' };
    return colors[type] || '#4F46E5';
}

async function handleEventDrop(info) {
    const eventData = { id: info.event.id, start_time: info.event.start.toISOString(), end_time: info.event.end ? info.event.end.toISOString() : info.event.start.toISOString() };
    try {
        await updateScheduleTime(eventData, info.event);
        showNotification('Jadwal berhasil dipindahkan', 'success');
    } catch (error) {
        console.error('Error updating schedule:', error);
        showNotification('Gagal memindahkan jadwal', 'error');
        info.revert();
    }
}

async function handleEventResize(info) {
    const eventData = { id: info.event.id, start_time: info.event.start.toISOString(), end_time: info.event.end.toISOString() };
    try {
        await updateScheduleTime(eventData, info.event);
        showNotification('Jadwal berhasil diubah', 'success');
    } catch (error) {
        console.error('Error updating schedule:', error);
        showNotification('Gagal mengubah jadwal', 'error');
        info.revert();
    }
}

async function updateScheduleTime(eventData, event) {
    const response = await axios.put(`/schedule/${eventData.id}`, {
        // Kirim semua data asli untuk jaga-jaga, tapi timpa dengan waktu baru
        ...event.extendedProps,
        title: event.title,
        start_time: eventData.start_time,
        end_time: eventData.end_time
    });
    return response.data;
}

function openAddModal(startDate = null, endDate = null) {
    const modal = document.getElementById("scheduleModal");
    if (!modal) return;
    document.getElementById("modal-title").textContent = "Tambah Jadwal Baru";
    const form = document.getElementById("schedule-form");
    form.reset();
    form.querySelector('#schedule-id').value = '';

    if (startDate) {
        document.getElementById("start_time").value = new Date(startDate.getTime() - (startDate.getTimezoneOffset() * 60000)).toISOString().slice(0, 16);
    }
    if (endDate) {
        document.getElementById("end_time").value = new Date(endDate.getTime() - (endDate.getTimezoneOffset() * 60000)).toISOString().slice(0, 16);
    } else if (startDate) {
        const oneHourLater = new Date(startDate);
        oneHourLater.setHours(oneHourLater.getHours() + 1);
        document.getElementById("end_time").value = new Date(oneHourLater.getTime() - (oneHourLater.getTimezoneOffset() * 60000)).toISOString().slice(0, 16);
    }
    modal.classList.remove("hidden");
    document.getElementById("title").focus();
}

function openEditModal(event) {
    const modal = document.getElementById("scheduleModal");
    if (!modal) return;
    document.getElementById("modal-title").textContent = "Edit Jadwal";
    const form = document.getElementById("schedule-form");
    form.reset();
    
    form.querySelector('#schedule-id').value = event.id;
    
    const fields = {
        'title': event.title,
        'description': event.extendedProps.description,
        'start_time': event.start ? new Date(event.start.getTime() - (event.start.getTimezoneOffset() * 60000)).toISOString().slice(0, 16) : '',
        'end_time': event.end ? new Date(event.end.getTime() - (event.end.getTimezoneOffset() * 60000)).toISOString().slice(0, 16) : '',
        'location': event.extendedProps.location,
        'instructor': event.extendedProps.instructor,
        'type': event.extendedProps.type
    };

    Object.keys(fields).forEach(key => {
        const input = form.querySelector(`#${key}`);
        if (input) input.value = fields[key] || '';
    });

    modal.classList.remove("hidden");
}

function closeModal(modal) {
    if (modal) modal.classList.add("hidden");
}

async function handleScheduleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    const isEdit = data.id !== '';

    try {
        const response = isEdit ? await axios.put(`/schedule/${data.id}`, data) : await axios.post('/schedule', data);
        closeModal(document.getElementById("scheduleModal"));
        showNotification(response.data.message || (isEdit ? 'Jadwal berhasil diperbarui' : 'Jadwal berhasil ditambahkan'), 'success');
        refreshScheduleData();
    } catch (error) {
        console.error("Error submitting form:", error.response?.data || error);
        showNotification(error.response?.data?.message || "Terjadi kesalahan.", 'error');
    }
}

window.deleteSchedule = async function(id) {
    if (!confirm("Apakah Anda yakin ingin menghapus jadwal ini?")) return;
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const response = await axios.delete(`/schedule/${id}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        showNotification(response.data.message || 'Jadwal berhasil dihapus', 'success');
        closeModal(document.getElementById("scheduleModal"));
        refreshScheduleData();
    } catch (error) {
        console.error("Error deleting schedule:", error);
        showNotification("Gagal menghapus jadwal.", 'error');
    }
}



window.editSchedule = function(id) {
    const event = calendar.getEventById(id);
    if (event) {
        openEditModal(event);
    } else {
        console.error(`Event with id ${id} not found.`);
    }
}

function toggleView(showCalendar) {
    document.getElementById("calendar-view").classList.toggle("hidden", !showCalendar);
    document.getElementById("list-view").classList.toggle("hidden", showCalendar);
    document.getElementById("toggleCalendarView").classList.toggle("bg-[#4F46E5]", showCalendar);
    document.getElementById("toggleCalendarView").classList.toggle("text-white", showCalendar);
    document.getElementById("toggleListView").classList.toggle("bg-[#4F46E5]", !showCalendar);
    document.getElementById("toggleListView").classList.toggle("text-white", !showCalendar);
}

function toggleCalendarView() { toggleView(true); }
function toggleListView() { toggleView(false); }

function filterSchedules() {
    refreshScheduleData();
}

async function refreshScheduleData() {
    const type = document.getElementById("filter-type").value;
    const date = document.getElementById("filter-date").value;
    const search = document.getElementById("search-schedule").value;
    
    try {
        const response = await axios.get('/schedule/data', { params: { type, date, search } });
        const schedules = response.data;
        window.scheduleData = schedules;
        
        calendar.removeAllEvents();
        calendar.addEventSource(schedules.map(s => formatEvent(s)));
        
        updateListView(schedules);
    } catch (error) {
        console.error('Error refreshing schedule data:', error);
        showNotification('Gagal memuat data jadwal', 'error');
    }
}

function updateListView(schedules) {
    const listEl = document.getElementById("schedule-list");
    if (!listEl) return;
    listEl.innerHTML = "";
    if (!schedules || schedules.length === 0) {
        listEl.innerHTML = '<div class="text-center text-gray-500 py-8">Tidak ada jadwal ditemukan</div>';
        return;
    }
    schedules.forEach(schedule => {
        listEl.appendChild(createScheduleListElement(schedule));
    });
}

function createScheduleListElement(schedule) {
    const div = document.createElement("div");
    div.className = "flex space-x-6 group";
    const startTime = new Date(schedule.start_time);
    const endTime = new Date(schedule.end_time);
    const color = getColorByType(schedule.type);

    div.innerHTML = `
        <div class="w-20 text-center">
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">${startTime.toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</div>
            <div class="text-xs text-gray-500 dark:text-gray-500">${endTime.toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</div>
        </div>
        <div class="flex-1 rounded-xl p-4 text-white group-hover:opacity-90 transition" style="background-color: ${color}">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="font-medium">${schedule.title || 'Tanpa Judul'}</h3>
                    <p class="text-sm mt-1">${schedule.description || ''}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex items-center space-x-4 text-sm">
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <span>${schedule.location || '-'}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-user fa-fw"></i>
                            <span>${schedule.instructor || '-'}</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="text-white hover:text-gray-200 p-1" onclick="editSchedule(${schedule.id})" title="Edit"><i class="fas fa-edit"></i></button>
                        <button class="text-white hover:text-gray-200 p-1" onclick="deleteSchedule(${schedule.id})" title="Hapus"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    `;
    return div;
}

function showNotification(message, type = 'info') {
    let notification = document.getElementById('notification');
    if (!notification) {
        notification = document.createElement('div');
        notification.id = 'notification';
        document.body.appendChild(notification);
    }
    const colors = { success: 'bg-green-500', error: 'bg-red-500', warning: 'bg-yellow-500', info: 'bg-blue-500' };
    notification.className = `fixed top-5 right-5 px-6 py-3 rounded-lg shadow-lg text-white z-50 transform transition-all duration-300 ${colors[type] || colors.info}`;
    notification.textContent = message;
    notification.style.transform = 'translateX(0)';
    setTimeout(() => {
        notification.style.transform = 'translateX(120%)';
    }, 3000);
}
