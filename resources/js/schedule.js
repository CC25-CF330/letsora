// Initialize variables
let calendar;
let currentEventId = null;
let scheduleModalInstance;

// Initialize calendar with data from PHP
function initCalendar() {
    // Check if FullCalendar is available
    if (typeof FullCalendar === 'undefined') {
        console.error('FullCalendar library is not loaded');
        return;
    }

    const calendarEl = document.getElementById("calendar");
    if (!calendarEl) {
        console.error('Calendar element not found');
        return;
    }
    
    // Ensure scheduleData exists
    if (!window.scheduleData || !Array.isArray(window.scheduleData)) {
        console.warn('Schedule data not found, initializing with empty array');
        window.scheduleData = [];
    }
    
    // Convert PHP schedule data to FullCalendar format
    const events = window.scheduleData.map(schedule => ({
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
    }));

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
        buttonText: {
            today: "Hari Ini",
            month: "Bulan",
            week: "Minggu",
            day: "Hari",
            list: "List",
        },
        dayMaxEvents: true,
        eventClick: handleEventClick,
        selectable: true,
        select: handleDateSelect,
        editable: true,
        eventDrop: handleEventDrop,
        eventResize: handleEventResize
    });
    
    calendar.render();
}

// Get color based on schedule type
function getColorByType(type) {
    const colors = {
        'class': '#4F46E5',
        'meeting': '#F59E0B',
        'personal': '#10B981'
    };
    return colors[type] || '#4F46E5';
}

// Handle event click
function handleEventClick(info) {
    currentEventId = info.event.id;
    openEditModal(info.event);
}

// Handle date selection (for creating new events)
function handleDateSelect(info) {
    openAddModal(info.start, info.end);
    calendar.unselect();
}

// Handle event drop (drag and drop)
async function handleEventDrop(info) {
    const eventData = {
        id: info.event.id,
        start_time: info.event.start.toISOString(),
        end_time: info.event.end ? info.event.end.toISOString() : info.event.start.toISOString()
    };

    try {
        await updateScheduleTime(eventData);
        showNotification('Jadwal berhasil dipindahkan', 'success');
    } catch (error) {
        console.error('Error updating schedule:', error);
        showNotification('Gagal memindahkan jadwal', 'error');
        info.revert();
    }
}

// Handle event resize
async function handleEventResize(info) {
    const eventData = {
        id: info.event.id,
        start_time: info.event.start.toISOString(),
        end_time: info.event.end.toISOString()
    };

    try {
        await updateScheduleTime(eventData);
        showNotification('Jadwal berhasil diubah', 'success');
    } catch (error) {
        console.error('Error updating schedule:', error);
        showNotification('Gagal mengubah jadwal', 'error');
        info.revert();
    }
}

// Update schedule time via API
async function updateScheduleTime(eventData) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    
    const response = await fetch(`/schedule/${eventData.id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken ? csrfToken.content : '',
        },
        body: JSON.stringify({
            start_time: eventData.start_time,
            end_time: eventData.end_time
        })
    });

    if (!response.ok) {
        throw new Error('Failed to update schedule');
    }
    
    return await response.json();
}

// Open add modal
function openAddModal(startDate = null, endDate = null) {
    const modal = document.getElementById("scheduleModal");
    const modalTitle = document.getElementById("modal-title");
    const scheduleForm = document.getElementById("schedule-form");
    const scheduleId = document.getElementById("schedule-id");

    if (!modal || !modalTitle || !scheduleForm) {
        console.error('Modal elements not found');
        return;
    }

    modalTitle.textContent = "Tambah Jadwal Baru";
    scheduleForm.reset();
    
    if (scheduleId) {
        scheduleId.value = "";
    }

    // Set default dates if provided
    if (startDate) {
        const startDateTime = startDate.toISOString().slice(0, 16);
        const startTimeInput = document.getElementById("start_time");
        if (startTimeInput) {
            startTimeInput.value = startDateTime;
        }
        
        const endTimeInput = document.getElementById("end_time");
        if (endTimeInput) {
            if (endDate) {
                const endDateTime = endDate.toISOString().slice(0, 16);
                endTimeInput.value = endDateTime;
            } else {
                // Default to 1 hour later
                const oneHourLater = new Date(startDate);
                oneHourLater.setHours(oneHourLater.getHours() + 1);
                endTimeInput.value = oneHourLater.toISOString().slice(0, 16);
            }
        }
    }

    modal.classList.remove("hidden");
    
    // Focus on first input
    const titleInput = document.getElementById("title");
    if (titleInput) {
        setTimeout(() => titleInput.focus(), 100);
    }
}

// Open edit modal
function openEditModal(event) {
    const modal = document.getElementById("scheduleModal");
    const modalTitle = document.getElementById("modal-title");
    const scheduleForm = document.getElementById("schedule-form");
    const scheduleId = document.getElementById("schedule-id");

    if (!modal || !modalTitle || !scheduleForm) {
        console.error('Modal elements not found');
        return;
    }

    modalTitle.textContent = "Edit Jadwal";
    
    if (scheduleId) {
        scheduleId.value = event.id;
    }

    // Fill form with event data
    const fields = {
        'title': event.title,
        'description': event.extendedProps.description || '',
        'start_time': event.start ? event.start.toISOString().slice(0, 16) : '',
        'end_time': event.end ? event.end.toISOString().slice(0, 16) : '',
        'location': event.extendedProps.location || '',
        'instructor': event.extendedProps.instructor || '',
        'type': event.extendedProps.type || 'class'
    };

    Object.keys(fields).forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (field) {
            field.value = fields[fieldName];
        }
    });

    modal.classList.remove("hidden");
}

// Handle schedule form submission
async function handleScheduleSubmit(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    const scheduleId = document.getElementById("schedule-id");
    const isEdit = scheduleId && scheduleId.value;

    // Validate required fields
    if (!data.title || !data.start_time || !data.end_time) {
        showNotification('Mohon lengkapi semua field yang wajib diisi', 'error');
        return;
    }

    // Validate time
    if (new Date(data.start_time) >= new Date(data.end_time)) {
        showNotification('Waktu mulai harus sebelum waktu selesai', 'error');
        return;
    }

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        const url = isEdit ? `/schedule/${scheduleId.value}` : "/schedule";
        const method = isEdit ? "PUT" : "POST";

        const response = await fetch(url, {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken ? csrfToken.content : '',
            },
            body: JSON.stringify(data),
        });

        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.message || `HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        
        // Close modal
        closeModal();
        
        // Show success message
        showNotification(
            isEdit ? 'Jadwal berhasil diperbarui' : 'Jadwal berhasil ditambahkan', 
            'success'
        );
        
        // Refresh calendar and list
        await refreshScheduleData();
        
    } catch (error) {
        console.error("Error:", error);
        showNotification(error.message || "Terjadi kesalahan. Silakan coba lagi.", 'error');
    }
}

// Delete schedule
async function deleteSchedule(id) {
    if (!confirm("Apakah Anda yakin ingin menghapus jadwal ini?")) {
        return;
    }

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        
        const response = await fetch(`/schedule/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": csrfToken ? csrfToken.content : '',
            },
        });

        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.message || `HTTP error! status: ${response.status}`);
        }

        showNotification('Jadwal berhasil dihapus', 'success');
        
        // Refresh calendar and list
        await refreshScheduleData();
        
        // Close modal if open
        closeModal();
        
    } catch (error) {
        console.error("Error deleting schedule:", error);
        showNotification(error.message || "Terjadi kesalahan saat menghapus jadwal. Silakan coba lagi.", 'error');
    }
}

// Edit schedule (called from list view)
function editSchedule(id) {
    // Find the event in calendar
    if (calendar) {
        const event = calendar.getEventById(id);
        if (event) {
            openEditModal(event);
            return;
        }
    }
    
    // Fetch from server if not in calendar
    fetch(`/schedule/${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(schedule => {
            const modal = document.getElementById("scheduleModal");
            const modalTitle = document.getElementById("modal-title");
            const scheduleId = document.getElementById("schedule-id");

            if (!modal || !modalTitle) {
                throw new Error('Modal elements not found');
            }

            modalTitle.textContent = "Edit Jadwal";
            
            if (scheduleId) {
                scheduleId.value = schedule.id;
            }
            
            const fields = {
                'title': schedule.title || '',
                'description': schedule.description || '',
                'start_time': schedule.start_time || '',
                'end_time': schedule.end_time || '',
                'location': schedule.location || '',
                'instructor': schedule.instructor || '',
                'type': schedule.type || 'class'
            };

            Object.keys(fields).forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    if (fieldName.includes('time') && fields[fieldName]) {
                        // Convert to datetime-local format
                        field.value = new Date(fields[fieldName]).toISOString().slice(0, 16);
                    } else {
                        field.value = fields[fieldName];
                    }
                }
            });
            
            modal.classList.remove("hidden");
        })
        .catch(error => {
            console.error("Error:", error);
            showNotification(error.message || "Terjadi kesalahan. Silakan coba lagi.", 'error');
        });
}

// Close modal
function closeModal() {
    const modal = document.getElementById("scheduleModal");
    if (modal) {
        modal.classList.add("hidden");
    }
}

// Refresh schedule data
async function refreshScheduleData() {
    try {
        const response = await fetch('/schedule/data');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const schedules = await response.json();
        window.scheduleData = schedules;
        
        // Update calendar events
        if (calendar) {
            calendar.removeAllEvents();
            const events = schedules.map(schedule => ({
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
            }));
            calendar.addEventSource(events);
        }
        
        // Update list view
        updateListView(schedules);
        
    } catch (error) {
        console.error('Error refreshing schedule data:', error);
        showNotification('Gagal memuat data jadwal', 'error');
        // Fallback to page reload as last resort
        setTimeout(() => {
            if (confirm('Terjadi kesalahan saat memuat data. Refresh halaman?')) {
                window.location.reload();
            }
        }, 1000);
    }
}

// Update list view
function updateListView(schedules) {
    const scheduleList = document.getElementById("schedule-list");
    if (!scheduleList) return;

    scheduleList.innerHTML = "";
    
    if (!schedules || schedules.length === 0) {
        scheduleList.innerHTML = '<div class="text-center text-gray-500 py-8">Tidak ada jadwal ditemukan</div>';
        return;
    }
    
    schedules.forEach(schedule => {
        const scheduleElement = createScheduleListElement(schedule);
        scheduleList.appendChild(scheduleElement);
    });
}

// Create schedule list element
function createScheduleListElement(schedule) {
    const div = document.createElement("div");
    div.className = "flex space-x-6 group";
    div.setAttribute("data-type", schedule.type || 'class');
    div.setAttribute("data-date", schedule.start_time || '');
    
    const startTime = new Date(schedule.start_time);
    const endTime = new Date(schedule.end_time);
    const color = getColorByType(schedule.type);
    
    div.innerHTML = `
        <div class="w-20">
            <div class="text-sm font-medium text-gray-500">${startTime.toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</div>
            <div class="text-xs text-gray-500">${endTime.toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</div>
        </div>
        <div class="flex-1 rounded-xl p-4 text-white group-hover:opacity-90 transition" style="background-color: ${color}">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="font-medium">${schedule.title || 'Tanpa Judul'}</h3>
                    <p class="text-sm mt-1">${schedule.description || ''}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-4 text-sm">
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>${schedule.location || '-'}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <img src="${schedule.instructor_photo_url || 'https://ui-avatars.com/api/?name=' + encodeURIComponent(schedule.instructor || 'Unknown')}" class="w-5 h-5 rounded-full" alt="Instructor">
                            <span>${schedule.instructor || '-'}</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="text-white hover:text-gray-200 p-1" onclick="editSchedule(${schedule.id})" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-white hover:text-gray-200 p-1" onclick="deleteSchedule(${schedule.id})" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    return div;
}

// Toggle between calendar and list view
function toggleCalendarView() {
    const calendarView = document.getElementById("calendar-view");
    const listView = document.getElementById("list-view");
    const calendarBtn = document.getElementById("toggleCalendarView");
    const listBtn = document.getElementById("toggleListView");

    if (!calendarView || !listView || !calendarBtn || !listBtn) {
        console.error('View toggle elements not found');
        return;
    }

    calendarView.classList.remove("hidden");
    listView.classList.add("hidden");
    
    calendarBtn.classList.remove("bg-gray-100", "dark:bg-gray-700", "text-gray-700", "dark:text-gray-300");
    calendarBtn.classList.add("bg-[#4F46E5]", "text-white");
    
    listBtn.classList.remove("bg-[#4F46E5]", "text-white");
    listBtn.classList.add("bg-gray-100", "dark:bg-gray-700", "text-gray-700", "dark:text-gray-300");
    
    // Render calendar if not already rendered
    if (calendar) {
        setTimeout(() => calendar.render(), 100);
    }
}

function toggleListView() {
    const calendarView = document.getElementById("calendar-view");
    const listView = document.getElementById("list-view");
    const calendarBtn = document.getElementById("toggleCalendarView");
    const listBtn = document.getElementById("toggleListView");

    if (!calendarView || !listView || !calendarBtn || !listBtn) {
        console.error('View toggle elements not found');
        return;
    }

    calendarView.classList.add("hidden");
    listView.classList.remove("hidden");
    
    listBtn.classList.remove("bg-gray-100", "dark:bg-gray-700", "text-gray-700", "dark:text-gray-300");
    listBtn.classList.add("bg-[#4F46E5]", "text-white");
    
    calendarBtn.classList.remove("bg-[#4F46E5]", "text-white");
    calendarBtn.classList.add("bg-gray-100", "dark:bg-gray-700", "text-gray-700", "dark:text-gray-300");
}

// Filter schedules in list view
function filterSchedules() {
    const searchInput = document.getElementById("search-schedule");
    const filterDate = document.getElementById("filter-date");
    const filterType = document.getElementById("filter-type");
    
    if (!searchInput || !filterDate || !filterType) {
        console.error('Filter elements not found');
        return;
    }
    
    const searchTerm = searchInput.value.toLowerCase();
    const dateFilter = filterDate.value;
    const typeFilter = filterType.value;
    const scheduleItems = document.querySelectorAll("#schedule-list > div[data-type]");

    scheduleItems.forEach((item) => {
        const titleElement = item.querySelector("h3");
        const descriptionElement = item.querySelector("p");
        
        if (!titleElement || !descriptionElement) return;
        
        const title = titleElement.textContent.toLowerCase();
        const description = descriptionElement.textContent.toLowerCase();
        const type = item.dataset.type;
        const dateStr = item.dataset.date;

        const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
        const matchesType = typeFilter === "all" || type === typeFilter;
        const matchesDate = dateStr ? filterByDate(new Date(dateStr), dateFilter) : true;

        item.style.display = matchesSearch && matchesType && matchesDate ? "flex" : "none";
    });
}

function filterByDate(date, filter) {
    if (!date || isNaN(date.getTime())) return true;
    
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    const scheduleDate = new Date(date);
    scheduleDate.setHours(0, 0, 0, 0);

    switch (filter) {
        case "today":
            return scheduleDate.getTime() === today.getTime();
        case "week":
            const startOfWeek = new Date(today);
            startOfWeek.setDate(today.getDate() - today.getDay());
            const endOfWeek = new Date(startOfWeek);
            endOfWeek.setDate(startOfWeek.getDate() + 6);
            return scheduleDate >= startOfWeek && scheduleDate <= endOfWeek;
        case "month":
            return scheduleDate.getMonth() === today.getMonth() && 
                   scheduleDate.getFullYear() === today.getFullYear();
        default:
            return true;
    }
}

// Show notification
function showNotification(message, type = 'info') {
    // Create notification element if it doesn't exist
    let notification = document.getElementById('notification');
    if (!notification) {
        notification = document.createElement('div');
        notification.id = 'notification';
        notification.className = 'fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300 transform translate-x-full';
        document.body.appendChild(notification);
    }

    // Set notification style based on type
    notification.className = 'fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
    
    switch (type) {
        case 'success':
            notification.className += ' bg-green-500 text-white';
            break;
        case 'error':
            notification.className += ' bg-red-500 text-white';
            break;
        case 'warning':
            notification.className += ' bg-yellow-500 text-white';
            break;
        default:
            notification.className += ' bg-blue-500 text-white';
    }

    notification.textContent = message;

    // Show notification
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 10);

    // Hide notification after 3 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
    }, 3000);
}

// Initialize everything when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    // Initialize calendar
    initCalendar();

    // Initialize list view with current data
    if (window.scheduleData) {
        updateListView(window.scheduleData);
    }

    // Modal event listeners
    const modal = document.getElementById("scheduleModal");
    const openModalBtn = document.getElementById("openAddModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const scheduleForm = document.getElementById("schedule-form");

    // Search and filter elements
    const searchInput = document.getElementById("search-schedule");
    const filterDate = document.getElementById("filter-date");
    const filterType = document.getElementById("filter-type");

    // View toggle buttons
    const toggleCalendarBtn = document.getElementById("toggleCalendarView");
    const toggleListBtn = document.getElementById("toggleListView");

    // Event listeners for modal
    if (openModalBtn) {
        openModalBtn.addEventListener("click", () => openAddModal());
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener("click", closeModal);
    }

    // Close modal when clicking outside or pressing Escape
    if (modal) {
        modal.addEventListener("click", (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && modal && !modal.classList.contains("hidden")) {
            closeModal();
        }
    });

    // Handle form submission
    if (scheduleForm) {
        scheduleForm.addEventListener("submit", handleScheduleSubmit);
    }

    // Search and filter functionality
    if (searchInput) {
        searchInput.addEventListener("input", filterSchedules);
    }
    if (filterDate) {
        filterDate.addEventListener("change", filterSchedules);
    }
    if (filterType) {
        filterType.addEventListener("change", filterSchedules);
    }

    // View toggle functionality
    if (toggleCalendarBtn) {
        toggleCalendarBtn.addEventListener("click", toggleCalendarView);
    }
    if (toggleListBtn) {
        toggleListBtn.addEventListener("click", toggleListView);
    }
});

// Make functions globally available
window.editSchedule = editSchedule;
window.deleteSchedule = deleteSchedule;
window.toggleCalendarView = toggleCalendarView;
window.toggleListView = toggleListView;