
 let clothesArray = ["платье аляпситое", "платье зеленое", "платье черное", "платье черно-белое", "плаье голубое", "платье белое"];

 let searchInput = document.getElementById("searchInput");
 let clothesList = document.getElementById("clothesList");
 
 searchInput.addEventListener("input", function() {
   let firstLetters = searchInput.value;
   clothesList.innerHTML = "";
   if (firstLetters.length > 0) {
     let isFind = false;
     for (let i = 0; i < clothesArray.length; i++) {
       let clothes = clothesArray[i];
       if (clothes.indexOf(firstLetters) == 0) {
         let listItem = document.createElement("li");
         listItem.textContent = clothes;
         clothesList.appendChild(listItem);
         isFind = true;
       }
     }
     if (!isFind) {
       let listItem = document.createElement("li");
       listItem.textContent = "Не найдено";
       clothesList.appendChild(listItem);
     }
   }
 });