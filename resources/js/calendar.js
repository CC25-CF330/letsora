document.addEventListener("DOMContentLoaded", function () {
    const datepickerEl = document.getElementById("datepicker-inline");

    if (!datepickerEl) {
        console.error("Calendar element not found");
        return;
    }

    // Fetch current date from the server
    fetch("/calendar/current-date")
        .then((response) => response.json())
        .then((data) => {
            // Update the data-date attribute
            datepickerEl.setAttribute("data-date", data.date);

            // Initialize datepicker using Flowbite's Datepicker
            const datepicker = new Datepicker(datepickerEl, {
                inline: true,
                defaultDate: new Date(data.date),
                theme: "light",
            });
        })
        .catch((error) => {
            console.error("Error fetching date:", error);
            // Fallback to current date if API fails
            const today = new Date();
            const formattedDate = `${(today.getMonth() + 1)
                .toString()
                .padStart(2, "0")}/${today
                .getDate()
                .toString()
                .padStart(2, "0")}/${today.getFullYear()}`;
            datepickerEl.setAttribute("data-date", formattedDate);

            const datepicker = new Datepicker(datepickerEl, {
                inline: true,
                defaultDate: today,
                theme: "light",
            });
        });
});
