export function blogSelect() {
  const filterOption = document.querySelector("#sort-category-blog-father");
  const selectedOptions = document.querySelector("#sonBlockCategory");
  let inputForUrlBlog = document.getElementById('inputForUrlBlog')
  filterOption.addEventListener("click", function(event) {
   
    let target = event.target;

    if (target.style.color === "blue" || target == filterOption) {
      return;
    }
    let sortTag = document.createElement("p");
    let sortTagClose = document.createElement("span");
    target.style.color = "blue";
    sortTag.innerHTML = target.innerHTML;
    selectedOptions.appendChild(sortTag);
    sortTag.classList.add("sort__tags");
    sortTag.appendChild(sortTagClose);
    sortTagClose.classList.add("sort__tags-close");
    inputForUrlBlog.value += target.innerHTML.replace(/\s/g,'')+',', '';
  });

  selectedOptions.addEventListener("click", function(event) {
    let target = event.target;
    
    if (target == selectedOptions || target.classList.contains("sort__tags")) {
      return;
    }
    inputForUrlBlog.value = inputForUrlBlog.value.replace(target.parentNode.textContent.replace(/\s/g,'')+',', '');
          const elements = document.querySelector(
            ".sort__tags-block-category-container"
          );
    target.parentNode.parentNode.removeChild(target.parentNode);
    for (let i = 0; i < elements.childNodes.length; i++) {
      if (
        elements.childNodes[i].innerHTML ==
        target.parentNode.innerHTML.replace(/<\/?[^>]+(>|$)/g, "")
      ) {
        elements.childNodes[i].style.color = "black";
      }
    }
  });

  const sortTagClear = document.querySelector("#sortTagClear");
  sortTagClear.addEventListener("click", function() {
    const selectedOptions = document.querySelector("#sonBlockCategory");
   selectedOptions.textContent = ''
   const elements = filterOption.querySelectorAll(".sort__tags-block-category-item");
      for (let i = 0; i < elements.length; i++) {
          elements[i].style.color = "black";
      }
      inputForUrlBlog.value = ''
  });

}
