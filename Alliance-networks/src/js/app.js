import $ from "jquery";
import '../bootstrap/js/bootstrap.min.js';



// sort by togle script
$(document).ready(function() {
  $('.sort__by-container').click(function(event){
  $('.sort__category-ul, .sort__by-category').toggleClass('active');   
  });  
  });
  

  // visible tags block
$(document).ready(function() {
  $('.sort__by-teg-req').click(function(event){
  $('.sort__tags-block, .sort__by-teg-req').toggleClass('active');   
  });  
  });
  

  // clear search form in page tags
  const clearSearch = document.getElementById('clearSearch');
  let searchInput = document.getElementById('searchInput');
console.log(searchInput.value)
  clearSearch.addEventListener('click', getClearSearch)
  function getClearSearch(){
    searchInput.value = '';
  }




