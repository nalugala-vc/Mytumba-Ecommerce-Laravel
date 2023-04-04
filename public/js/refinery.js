// add click event listener to main li components
const liElements = document.querySelectorAll('.nav ul li');
liElements.forEach(li => {
  li.addEventListener('click', function() {
    // toggle the active class on the clicked li element
    this.classList.toggle('active');
    
    // close all other dropdown menus except for the clicked one
    const dropdowns = document.querySelectorAll('nav ul li:not(.active) ul');
    dropdowns.forEach(dropdown => {
      dropdown.style.display = 'none';
    });
    
    // toggle the display of the dropdown menu for the clicked li element
    const dropdown = this.querySelector('ul');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
  });
});
