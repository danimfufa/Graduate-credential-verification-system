const images = [
  'wuoffice.JPG',
  'image1.jpg', // Replace with actual image URLs or paths
  'image2.jpg',
  'image3.jpg',
];

let index = 0;

function changeBackground() {
  let mainCenter= document.getElementsById('centerDiv');
  mainCenter.style.backgroundImage = `url(${images[index]})`;
  mainCenter.style.backgroundPosition = 'center';
  mainCenter.style.backgroundSize = 'cover';
  mainCenter.style.backgroundRepeat = 'no-repeat';
  index = (index + 1) % images.length; // Cycle through images
}

// Change background every second (50000ms)
setInterval(changeBackground, 2000);
