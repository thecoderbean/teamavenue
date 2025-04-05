<!DOCTYPE html>
<html lang="en">
<head>
  <title>Team Avenue </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="HTML5 website template">
  <meta name="keywords" content="global, template, html, sass, jquery">
  <meta name="author" content="Bucky Maler">
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/bestin.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="device-notification">
  <a class="device-notification--logo" href="#0">
  <img src="<?= base_url('assets/img/logo.png') ?>" alt="Team Avenue">
    <p>Team Avenue</p>
  </a>
  <p class="device-notification--message">we request you orient your device to portrait or find a larger screen. You won't be disappointed.</p>
</div>

<div class="perspective effect-rotate-left">
  <div class="container"><div class="outer-nav--return"></div>
    <div id="viewport" class="l-viewport">
      <div class="l-wrapper">
        <header class="header">
          <a class="header--logo" href="#0">
          <img src="<?= base_url('assets/img/logo.png') ?>" alt="Team Avenue">
            <p>Team Avenue</p>
          </a>
          <button class="header--cta cta">Hire Us</button>
          <div class="header--nav-toggle">
            <span></span>
          </div>
        </header>
        <nav class="l-side-nav">
          <ul class="side-nav">
            <li class="is-active"><span>Home</span></li>
            <li><span>About</span></li>
            <li><span>Sip-Calculator</span></li>
            <li><span>Works</span></li>
            <li><span>Contact</span></li>
            <li><span>Hire us</span></li>
          </ul>
        </nav>
        <ul class="l-main-content main-content">
          <li class="l-section section section--is-active">
            <div class="intro">
              <div class="intro--banner">
                <h1>Your Journey<br>to Financial<br>Freedom</h1>
                <button class="cta">Hire Us
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                    </g>
                  </svg>
                  <span class="btn-background"></span>
                </button>
                <img src="assets/img/introduction-visual.png" alt="Welcome">
              </div>
              <div class="mobile-contact">
                <img src="assets/img/team.png" alt="Mobile View Image" class="mobile-only-image">
              </div>

              <div class="floating-buttons">
                <a href="https://wa.me/1234567890" class="floating-btn whatsapp-btn" target="_blank">
                  <i class="fa-brands fa-whatsapp"></i>
                </a>
                <a href="tel:+1234567890" class="floating-btn call-btn">
                  <i class="fa-solid fa-phone"></i>
                </a>
              </div>

              <div class="scroll-down">
                <a href="#work">
                  <i class="fa-solid fa-angle-down"></i>
                </a>
              </div>
            </div>
          </li>

          <!-- New About Section -->
          <li class="l-section section">
              <div class="about">
              <div class="team-section">
              <div class="team-text">
              <h2>About Us</h2>
              <p>Whether you're a beginner taking your first steps into the world of trading or a seasoned investor seeking advanced strategies to optimize your portfolio, TeamAvenue is here to guide you at every stage of your journey. We pride ourselves on offering cutting-edge tools, personalized insights, and a user-friendly platform designed to empower traders of all levels.</p>
                  <p>Our services include real-time market analysis, risk management tools, and educational resources to help you build confidence in your trading decisions. At TeamAvenue, we prioritize your financial goals, providing expert support, secure transactions, and transparent processes to ensure a seamless trading experience.</p>
                    </div>
                <div class="team-image">
              <img src="assets/img/about.png" alt="Team Image">
             </div>
             <a href="blog.php">
                    <button class="blog-button" id="blogBtn">Take a look at our blog</button>
                    </a>
                </div>
          </div>
          </li>

          <!-- Modified SIP Calculator Section (shifted down) -->
          <li class="l-section section">
            <div class="about">
              <div class="about--banner">
                <a href="#0">
                  <span>
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                      <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                        <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                      </g>
                    </svg>
                  </span>
                </a>
                <img src="assets/img/about-visual.png" alt="About Us">
              </div>
              
              <div class="sip-calculator">
                <h3>SIP Calculator</h3>
                <div class="calculator-container">
                  <div class="input-section">
                    <div class="input-group">
                      <label for="monthly-investment">Monthly Investment (₹)</label>
                      <input type="number" id="monthly-investment" min="500" value="10000">
                    </div>
                    <div class="input-group">
                      <label for="investment-period">Investment Period (Years)</label>
                      <input type="number" id="investment-period" min="1" max="30" value="10">
                    </div>
                    <div class="input-group">
                      <label for="expected-return">Expected Return Rate (% p.a.)</label>
                      <input type="number" id="expected-return" min="1" max="30" step="0.1" value="12">
                    </div>
                  </div>
                  <div class="result-section">
                    <div class="result-group">
                      <div class="result-item">
                        <span>Invested Amount:</span>
                        <span id="invested-amount">₹0</span>
                      </div>
                      <div class="result-item">
                        <span>Wealth Gained:</span>
                        <span id="wealth-gained">₹0</span>
                      </div>
                      <div class="result-item total">
                        <span>Total Value:</span>
                        <span id="total-value">₹0</span>
                      </div>
                    </div>
                    <div class="chart-container">
                      <canvas id="sipChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <!-- Work Section -->
          <li class="l-section section">
            <div class="work">
              <div class="work--lockup">
                <ul class="slider">
                  <li class="slider--item slider--item-left">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="assets/img/work-training.jpg" alt="Victory">
                      </div>
                      <p class="slider--item-title">Dmat Account</p>
                      <p class="slider--item-description">Open your Dmat account with us for seamless trading.</p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-left">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="assets/img/work-training.jpg" alt="work-training">
                      </div>
                      <p class="slider--item-title">Training</p>
                      <p class="slider--item-description">Comprehensive training programs for financial literacy and investment strategies.</p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-center">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="assets/img/work-training.jpg" alt="Metiew and Smith">
                      </div>
                      <p class="slider--item-title">Stock Brokering</p>
                      <p class="slider--item-description">Intermediary between you and yor stocks, providing investment advice and management</p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-right">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="assets/img/work-training.jpg" alt="Alex Nowak">
                      </div>
                      <p class="slider--item-title">Financial Planning</p>
                      <p class="slider--item-description">Expert financial planning advice for your future goals.</p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-right">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="assets/img/work-training.jpg" alt="Alex Nowak">
                      </div>
                      <p class="slider--item-title">Tax Filing</p>
                      <p class="slider--item-description">Hassle-free tax filing services to ensure compliance.</p>
                    </a>
                  </li>
                </ul>
                <div class="slider--prev">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                      c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                      c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z"/>
                    </g>
                  </svg>
                </div>
                <div class="slider--next">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                    </g>
                  </svg>
                </div>
              </div>
            </div>
          </li>

          <li class="l-section section">
            <div class="contact">
              <div class="contact--lockup">
                <div class="modal">
                  <div class="modal--information">
                    <p>First Floor, Welmen Center, Panavila Junction, Thiruvananthapuram, India, Kerala</p>
                    <a href="mailto:info@TeamAvenues.com">info@TeamAvenues.com</a>
                    <a href="tel:+148126287560">+91 94966 46800</a>
                  </div>
                  <ul class="modal--options">
                    <li><a href="https://www.instagram.com/avenueteams/"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="https://www.facebook.com/avenueteams/"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="https://www.youtube.com/c/TeamAvenues"><i class="fab fa-youtube"></i> YouTube</a></li>
                    <li><a href="https://wa.me/+919074242801"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                    <li><a href="mailto:avenueteams@gmail.com">Contact Us</a></li>
                  </ul>
                  <a href="TC.pdf" download="<?= base_url('TC.pdf') ?>">Terms & Conditions</a>
                </div>
              </div>
            </div>
          </li>

          <!-- Work Request Form Section -->
            <li class="l-section section">
            <div class="hire">
              <!-- Message area -->
                <h2>You want us to do</h2>
                <div id="formMessages" style="display: none;"></div>
                <form id="workRequestForm">
                <div class="work-request--options">
                    <span class="options-a">
                    <input id="opt-1" type="checkbox" name="services[]" value="training">
                    <label for="opt-1">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                        </g>
                        </svg>
                        Training
                    </label>
                    <input id="opt-2" type="checkbox" name="services[]" value="stock_brokering">
                    <label for="opt-2">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                        </g>
                        </svg>
                        Stock Brokering
                    </label>
                    <input id="opt-3" type="checkbox" name="services[]" value="tax_filing">
                    <label for="opt-3">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                        </g>
                        </svg>
                        Tax Filing
                    </label>
                    </span>
                    <span class="options-b">
                    <input id="opt-4" type="checkbox" name="services[]" value="financial_planning">
                    <label for="opt-4">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                        </g>
                        </svg>
                        Financial Planning
                    </label>
                    <input id="opt-5" type="checkbox" name="services[]" value="dmat_account">
                    <label for="opt-5">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                        </g>
                        </svg>
                        Dmat Account
                    </label>
                    <input id="opt-6" type="checkbox" name="services[]" value="live_support">
                    <label for="opt-6">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                        </g>
                        </svg>
                        Market Support
                    </label>
                    </span>
                </div>
                <div class="work-request--information">
                    <div class="form-container">
                    <div class="form-group">
                        <input type="text" id="name" name="name" spellcheck="false" required>
                        <label for="name">Name</label>
                        <span class="input-border"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" spellcheck="false" required>
                        <label for="email">Email</label>
                        <span class="input-border"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone" name="phone" spellcheck="false" required>
                        <label for="phone">Phone</label>
                        <span class="input-border"></span>
                        </div>
                <input type="submit" value="Send Request" class="submit-btn">
                </form>
                    </div>
                    </div>
                
            </div>
            </li>
        </ul>
      </div>
    </div>
  </div>
  <ul class="outer-nav">
    <li class="is-active">Home</li>
    <li>About</li>
    <li><span>Sip-Calculator</span></li>
    <li>Works</li>
    <li>Contact</li>
    <li>Hire us</li>
  </ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('assets/js/vendor/jquery-2.2.4.min.js') ?>"><\/script>')</script>
<script src="<?= base_url('assets/js/functions-min.js') ?>"></script>
<script src="<?= base_url('assets/js/bestin.js') ?>"></script>
<script>
$('#workRequestForm').submit(function(e) {
    e.preventDefault(); // stop normal form submission

    var formData = $(this).serialize();

    $.ajax({
        url: "<?= base_url('work-request/submit') ?>",
        method: "POST",
        data: formData,
        dataType: "json",
        success: function(response) {
            showMessage('success', response.message);
            $('#workRequestForm')[0].reset(); // Reset form on success
        },
        error: function(xhr) {
            var response = xhr.responseJSON;
            if (response && response.errors) {
                let errorMessages = Object.values(response.errors).join('<br>');
                showMessage('error', errorMessages);
            } else if(response && response.message) {
                showMessage('error', response.message);
            } else {
                showMessage('error', 'An unexpected error occurred.');
            }
        }
    });
});

function showMessage(type, message) {
    var formMessages = $('#formMessages');
    formMessages.removeClass().addClass(type).html(message).fadeIn();

    setTimeout(() => {
        formMessages.fadeOut();
    }, 5000); // Hide after 5 seconds
}
</script> 
</body>
</html>
