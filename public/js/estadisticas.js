document.addEventListener("DOMContentLoaded", () => {
    const adopcionesPorMes = JSON.parse(document.getElementById('adopcionesPorMes').textContent);
    const registrosRefugiosPorMes = JSON.parse(document.getElementById('registrosRefugiosPorMes').textContent);

    const ctx = document.getElementById('estadisticasChart').getContext('2d');
    const estadisticasChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [
                {
                    label: 'Adopciones por Mes',
                    data: adopcionesPorMes,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                },
                {
                    label: 'Registros de Refugios por Mes',
                    data: registrosRefugiosPorMes,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderWidth: 2,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Estadísticas de Adopciones y Registros',
                },
            },
        },
    });
});