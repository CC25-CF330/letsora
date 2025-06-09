// document.addEventListener("DOMContentLoaded", function () {
//     // Fetch weekly activity
//     fetchWeeklyActivity();
// });

// async function fetchWeeklyActivity() {
//     try {
//         const response = await fetch("/activity/weekly");
//         const activities = await response.json();
//         displayWeeklyActivity(activities);
//     } catch (error) {
//         console.error("Error fetching weekly activity:", error);
//     }
// }

// function displayWeeklyActivity(activities) {
//     const activityChart = document.getElementById("activity-chart");
//     if (!activityChart) return;

//     // Prepare data for the chart
//     const labels = Object.keys(activities);
//     const taskData = labels.map((day) => activities[day].task_count || 0);
//     const completedData = labels.map(
//         (day) => activities[day].completed_tasks || 0
//     );

//     // Create or update the chart
//     if (window.activityChart) {
//         window.activityChart.destroy();
//     }

//     window.activityChart = new Chart(activityChart, {
//         type: "bar",
//         data: {
//             labels: labels,
//             datasets: [
//                 {
//                     label: "Total Tasks",
//                     data: taskData,
//                     backgroundColor: "rgba(59, 130, 246, 0.5)",
//                     borderColor: "rgb(59, 130, 246)",
//                     borderWidth: 1,
//                 },
//                 {
//                     label: "Completed Tasks",
//                     data: completedData,
//                     backgroundColor: "rgba(16, 185, 129, 0.5)",
//                     borderColor: "rgb(16, 185, 129)",
//                     borderWidth: 1,
//                 },
//             ],
//         },
//         options: {
//             responsive: true,
//             scales: {
//                 y: {
//                     beginAtZero: true,
//                     ticks: {
//                         stepSize: 1,
//                     },
//                 },
//             },
//             plugins: {
//                 legend: {
//                     position: "top",
//                 },
//                 title: {
//                     display: true,
//                     text: "Weekly Activity Overview",
//                 },
//             },
//         },
//     });
// }

// async function recordActivity(taskCount, completedTasks) {
//     try {
//         const response = await fetch("/activity", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//                 "X-CSRF-TOKEN": document.querySelector(
//                     'meta[name="csrf-token"]'
//                 ).content,
//             },
//             body: JSON.stringify({
//                 task_count: taskCount,
//                 completed_tasks: completedTasks,
//             }),
//         });

//         if (response.ok) {
//             fetchWeeklyActivity();
//         } else {
//             console.error("Error recording activity");
//         }
//     } catch (error) {
//         console.error("Error:", error);
//     }
// }
