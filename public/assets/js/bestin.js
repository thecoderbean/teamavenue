let sipChart;

function calculateSIP() {
  const monthlyInvestment = parseFloat(document.getElementById('monthly-investment').value) || 0;
  const years = parseFloat(document.getElementById('investment-period').value) || 0;
  const annualRate = parseFloat(document.getElementById('expected-return').value) || 0;
  
  const months = years * 12;
  const monthlyRate = annualRate / 12 / 100;
  
  const futureValue = monthlyInvestment * 
    ((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * 
    (1 + monthlyRate);
  
  const investedAmount = monthlyInvestment * months;
  const wealthGained = futureValue - investedAmount;
  
  // Format numbers
  const formatNumber = (num) => {
    return '₹' + Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  };
  
  // Update text results
  document.getElementById('invested-amount').textContent = formatNumber(investedAmount);
  document.getElementById('wealth-gained').textContent = formatNumber(wealthGained);
  document.getElementById('total-value').textContent = formatNumber(futureValue);
  
  // Update chart
  updateChart(investedAmount, wealthGained);
}

function updateChart(invested, gained) {
  const ctx = document.getElementById('sipChart').getContext('2d');
  
  if (sipChart) {
    sipChart.destroy();
  }
  
  sipChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Invested Amount', 'Wealth Gained'],
      datasets: [{
        data: [invested, gained],
        backgroundColor: [
          'rgba(54, 162, 235, 0.8)',
          'rgba(75, 192, 192, 0.8)'
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top',
          labels: {
            color: '#fff',
            font: {
              size: 14
            }
          }
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              let label = context.label || '';
              if (label) {
                label += ': ';
              }
              label += '₹' + Math.round(context.parsed).toLocaleString('en-IN');
              return label;
            }
          }
        }
      }
    }
  });
}

// Add event listeners
document.querySelectorAll('.sip-calculator input').forEach(input => {
  input.addEventListener('input', calculateSIP);
});

// Initial calculation
calculateSIP();

      document.addEventListener("DOMContentLoaded", function () {
    const blogBtn = document.getElementById("blogBtn");

    function toggleBlogButton() {
        setTimeout(() => {
            blogBtn.style.opacity = "1";
            blogBtn.style.transform = "translateX(0)";
            
            setTimeout(() => {
                blogBtn.style.opacity = "0";
                blogBtn.style.transform = "translateX(20px)";
            }, 2500);
        }, 2500);
    }

    setInterval(toggleBlogButton, 5000);
});
//work request ajax