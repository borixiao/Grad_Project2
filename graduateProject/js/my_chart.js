const myChartEl = document.getElementById('myChart');
const myChart1El = document.getElementById('myChart1');

if (myChartEl && myChart1El) {
    const ctx = myChartEl.getContext('2d');
    const earning = myChart1El.getContext('2d');

    const palette = [
        'rgba(31, 61, 46, 0.85)',
        'rgba(90, 122, 101, 0.85)',
        'rgba(154, 146, 124, 0.85)',
        'rgba(222, 216, 199, 0.85)',
        'rgba(91, 86, 68, 0.85)',
        'rgba(199, 191, 168, 0.85)'
    ];

    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: chartData.categoryLabels,
            datasets: [{
                label: '商品數量',
                data: chartData.categoryCounts,
                backgroundColor: palette,
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: { display: true, text: '各品牌商品數量' }
            },
            responsive: true
        }
    });

    const myChart1 = new Chart(earning, {
        type: 'bar',
        data: {
            labels: chartData.subcategoryLabels,
            datasets: [{
                label: '商品數量',
                data: chartData.subcategoryCounts,
                backgroundColor: 'rgba(31, 61, 46, 0.6)',
                borderColor: 'rgba(31, 61, 46, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: { display: true, text: '各部件商品數量' }
            },
            responsive: true,
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
}
