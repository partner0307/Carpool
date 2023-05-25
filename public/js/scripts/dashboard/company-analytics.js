let platformChart = document.querySelector('#platform-chart');
let avgSessionsChart = document.querySelector('#avg-sessions-chart');
let statisticsProfitChart = document.querySelector('#statistics-profit-chart');
let coChart = document.querySelector('#co-chart');

const platformChartOptions = {
    chart: {
        type: 'donut',
        height: 120,
        toolbar: { show: false }
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val + '%';
        },
        style: {
            fontSize: '10px',
            color: '#fff'
        }
    },
    series: [78, 100-78],
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: ['Earning', 'Remaining'],
    stroke: { width: 0 },
    colors: ['#ea545590', '#826af9'],
    grid: {
        padding: {
            right: -20,
            bottom: -8,
            left: -20
        }
    },
    plotOptions: {
        pie: {
            startAngle: -0,
            donut: {
                labels: {
                    show: true,
                    name: { offsetY: 15 },
                    value: {
                        offsetY: -15,
                        formatter: function (val) { return parseInt(val) + '%' }
                    },
                    total: {
                        show: true,
                        offsetY: 15,
                        label: 'Total',
                        formatter: function (w) { return 234 }
                    }
                }
            }
        }
    },
    responsive: [
        {
            breakpoint: 1325,
            options: {
                chart: { height: 100 }
            }
        },
        {
            breakpoint: 1200,
            options: {
                chart: { height: 120 }
            }
        },
        {
            breakpoint: 1045,
            options: {
                chart: { height: 100 }
            }
        },
        {
            breakpoint: 992,
            options: {
                chart: { height: 120 }
            }
        }
    ]
};
platformChart = new ApexCharts(platformChart, platformChartOptions);
platformChart.render();

const avgSessionsChartOptions = {
    chart: {
        type: 'bar',
        height: 200,
        toolbar: { show: false }
    },
    dataLabels: {enabled: false},
    colors: [
        '#ebf0f7',
        '#ebf0f7',
        window.colors.solid.primary,
        '#ebf0f7',
        '#ebf0f7',
        '#ebf0f7',
        '#ebf0f7',
    ],
    series: [
        {
            name: 'Sessions',
            data: [75, 125, 225, 175, 125, 75, 25]
        }
    ],
    legend: {show: false},
    grid: {
        show: false,
        padding: {
            left: 0,
            right: 0
        }
    },
    plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
            endingShape: 'rounded'
        }
    },
    xaxis: {
        type: 'category',
        categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
    }
};
avgSessionsChart = new ApexCharts(avgSessionsChart, avgSessionsChartOptions);
avgSessionsChart.render();

const statisticsProfitChartOptions = {
    chart: {
      height: 70,
      type: 'line',
      toolbar: {
        show: false
      },
      zoom: {
        enabled: false
      }
    },
    grid: {
      borderColor: '#EBEBEB',
      strokeDashArray: 5,
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      },
      padding: {
        top: -30,
        bottom: -10
      }
    },
    stroke: {
      width: 3
    },
    colors: [window.colors.solid.info],
    series: [
      {
        data: [0, 20, 5, 30, 15, 45]
      }
    ],
    markers: {
      size: 2,
      colors: window.colors.solid.info,
      strokeColors: window.colors.solid.info,
      strokeWidth: 2,
      strokeOpacity: 1,
      strokeDashArray: 0,
      fillOpacity: 1,
      discrete: [
        {
          seriesIndex: 0,
          dataPointIndex: 5,
          fillColor: '#ffffff',
          strokeColor: window.colors.solid.info,
          size: 5
        }
      ],
      shape: 'circle',
      radius: 2,
      hover: {
        size: 3
      }
    },
    xaxis: {
      labels: {
        show: true,
        style: {
          fontSize: '0px'
        }
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      show: false
    },
    tooltip: {
      x: {
        show: false
      }
    }
};
statisticsProfitChart = new ApexCharts(statisticsProfitChart, statisticsProfitChartOptions);
statisticsProfitChart.render();

const coChartOptions = {
    chart: {
        type: 'donut',
        height: 120,
        toolbar: { show: false }
    },
    dataLabels: { enabled: false },
    series: [48, 100-48],
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: ['Earning', 'Remaining'],
    stroke: { width: 0 },
    colors: [window.colors.solid.success, '#28c76f33'],
    grid: {
        padding: {
            right: -20,
            bottom: -8,
            left: -20
        }
    },
    plotOptions: {
        pie: {
            startAngle: -0,
            donut: {
                labels: {
                    show: true,
                    name: { offsetY: 15 },
                    value: {
                        offsetY: -15,
                        formatter: function (val) { return parseInt(val) + '%' }
                    },
                    total: {
                        show: true,
                        offsetY: 15,
                        label: 'Total',
                        formatter: function (w) { return 48 + '%' }
                    }
                }
            }
        }
    },
    responsive: [
        {
            breakpoint: 1325,
            options: {
                chart: { height: 100 }
            }
        },
        {
            breakpoint: 1200,
            options: {
                chart: { height: 120 }
            }
        },
        {
            breakpoint: 1045,
            options: {
                chart: { height: 100 }
            }
        },
        {
            breakpoint: 992,
            options: {
                chart: { height: 120 }
            }
        }
    ]
};
coChart = new ApexCharts(coChart, coChartOptions);
coChart.render();
