$(document).ready(function () {
    $('#enteranceModal').modal('show');
    //  ===============================================
    const value = 66.1;
    const chartData = {
        labels: ['Completed', 'Remaining'],
        datasets: [{
            data: [value, 100 - value],
            backgroundColor: ['#d0aed2', '#e0e0e0'],
            hoverOffset: 4,
            borderWidth: 0
        }]
    };

    const config = {
        type: 'doughnut',
        data: chartData,
        options: {
            cutout: '70%',
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false }
            }
        }
    };

    new Chart($('#donutChart'), config);
});