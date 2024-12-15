// Extract category names and post counts
const categories = postsPerCategory.map((item) => item.category_name);
const postCounts = postsPerCategory.map((item) => item.post_count);
// Color mapping for categories using distinct
const categoryColors = {
    Programming: "rgba(255, 205, 86, 0.6)", // Yellow
    Design: "rgba(153, 102, 255, 0.6)", // Purple
    Personal: "rgba(255, 99, 71, 0.6)", // Tomato Red (distinct from Marketing)
};
// Assign colors dynamically based on category
const colors = categories.map(
    (category) => categoryColors[category] || "rgba(255, 205, 86, 0.6)"
); // Default to Yellow
// Initialize Chart.js
const ctx = document.getElementById("postsCategoryChart").getContext("2d");
const postsCategoryChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: categories,
        datasets: [
            {
                data: postCounts,
                backgroundColor: colors, // Use the mapped colors
                borderColor: colors.map((color) => color.replace("0.6", "1")), // Darker border color
                borderWidth: 1,
                hoverBackgroundColor: colors.map((color) =>
                    color.replace("0.6", "0.8")
                ), // Darker shade on hover
                hoverBorderColor: colors.map((color) =>
                    color.replace("0.6", "1.0")
                ), // Darker border on hover
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                ticks: {
                    font: {
                        size: 14,
                        weight: "bold",
                    },
                },
            },
            y: {
                ticks: {
                    font: {
                        size: 14,
                        weight: "bold",
                    },
                    beginAtZero: true,
                },
            },
        },
        plugins: {
            legend: {
                display: false, // Hide the legend
            },
        },
    },
});
// Show message if there are no posts
if (postCounts.every((count) => count === 0)) {
    document.getElementById("noPostsMessage").classList.remove("hidden");
}
