function createSlider(slides) {
    const sliderContainer = document.querySelector('#slider-container');
    const slider = document.createElement('div');
    slider.classList.add('slider');
    const image = document.createElement('img');
    image.src = slides[0].src;
    const caption = document.createElement('p');
    caption.textContent = slides[0].caption;
    const previousButton = document.createElement('button');
    previousButton.textContent = 'Previous';
    const nextButton = document.createElement('button');
    nextButton.textContent = 'Next';

    let currentSlideIndex = 0;

    function showSlide(index) {
    image.src = slides[index].src;
    caption.textContent = slides[index].caption;
    }

    function showPreviousSlide() {
    currentSlideIndex--;
    if (currentSlideIndex < 0) {
        currentSlideIndex = slides.length - 1;
    }
    showSlide(currentSlideIndex);
    }

    function showNextSlide() {
    currentSlideIndex++;
    if (currentSlideIndex >= slides.length) {
        currentSlideIndex = 0;
    }
    showSlide(currentSlideIndex);
    }

    previousButton.addEventListener('click', showPreviousSlide);
    nextButton.addEventListener('click', showNextSlide);

    slider.appendChild(image);
    slider.appendChild(caption);
    slider.appendChild(previousButton);
    slider.appendChild(nextButton);
    sliderContainer.appendChild(slider);
}

  // Call the createSlider function with the slides array
createSlider(slides);
