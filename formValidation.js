function setDefaultAndHideFirstOption(selectElementId, defaultOptionValue) {
  const selectElement = document.getElementById('role');
  if (selectElement && selectElement.options.length > 0) {
    let defaultFound = false;
    for (let i = 0; i < selectElement.options.length; i++) {
      if (selectElement.options[i].value === defaultOptionValue) {
        selectElement.selectedIndex = i;
        defaultFound = true;
        break;
      }
    }

    // If the default option wasn't found, you might want to handle this case
    if (defaultFound) {
      // Hide the first option
      //selectElement.options[0].style.display = 'none';
      // Optionally disable it to prevent selection
      // selectElement.options[0].disabled = true;
    } else {
      console.warn(`Default option with value "${defaultOptionValue}" not found in select element with ID "${selectElementId}".`);
    }
  }
}
document.addEventListener('DOMContentLoaded', function() {
  setDefaultAndHideFirstOption('role', 'External User');
});
