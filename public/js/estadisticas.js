// Función para crear una gráfica
function createChart(canvasId, label, dataValue) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Registros Año', 'Registros Hoy'],
            datasets: [{
                label: label,
                data: dataValue,
                backgroundColor: ['#66CCCC', '#FFB6C1'],
                borderColor: ['#56B2B2', '#E099A6'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            cutout: '60%',
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
}

// Crear gráficos con los datos de la base de datos
createChart('adoptantes-chart', 'Adoptantes', [data.adoptantes_ano, data.adoptantes_hoy]);
createChart('refugios-chart', 'Refugios', [data.refugios_ano, data.refugios_hoy]);