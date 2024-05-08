const packageContainer = document.getElementById('package-container');
const loadingMessage = document.getElementById('loading-message');

// this is not working due to the CORS-error
// This is the actual API endpoint URL
const apiUrl = '/api/v1/package/find-all';

async function fetchPackageData() {
    console.log("hello from fetchPackageData");

  try {
    console.log("hello from fetchPackageData try");

    loadingMessage.textContent = 'Fetching packages...'; // Update loading message

    const response = await axios.get(apiUrl);
    const packages = response.data;

    packageContainer.innerHTML = ''; // Clear container before appending elements
    packages.forEach(package => {
      const packageElement = createPackageElement(package);
      packageContainer.appendChild(packageElement);
    });

    loadingMessage.style.display = 'none'; // Hide loading message after success
  } catch (error) {
    console.log("hello from error");

    console.error('Error fetching package data:', error);
    loadingMessage.textContent = 'Error loading packages!'; // Update loading message on error
  }
}

function createPackageElement(packageData) {
  const { type, price } = packageData;
console.log("hello from createPackageElement");
  const packageCard = document.createElement('div');
  packageCard.classList.add('col-lg-4', 'col-md-6', 'col-sm-6');
  packageCard.innerHTML = `
    <div class="properties mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
      <div class="properties__card">
        <div class="about-icon">
          <img src="assets/img/icon/price.svg" alt="">
        </div>
       
          <div class="single-features mb-20">
            <div class="features-icon">
              <img src="assets/img/icon/check.svg" alt="">
            </div>
            <div class="features-caption">
              <p>Month to month</p>
            </div>
          </div>
          <a href="paymentForm.html" class="border-btn border-btn2">Join Now</a>
        </div>
      </div>
    </div>
  `;

  return packageCard;
}

fetchPackageData();
