function submitScore(score) {

    alert("Your Score is : " + score);
    
    // const U_ID = 123;
    // const G_ID = 1231;
    try{
        console.log(U_ID);
        console.log(G_ID);
        const xhr1 = new XMLHttpRequest();
        const url = 'add_score.php?score='+score+'&user_id='+U_ID+'&game_id='+G_ID; // Replace with your server-side endpoint URL
        // const url = 'add_score.php';
        xhr1.open('GET', url , true);
        xhr1.setRequestHeader('Content-Type', 'application/json');
        xhr1.onload = function () {
            if (xhr1.status === 200) {
            console.log('Rating updated successfully!');
            } else {
            console.error('Error updating rating:', xhr1.status);
            }
        };

        const data = JSON.stringify({ score: score , user_Id: U_ID , game_id : G_ID});
        xhr1.send();
        alert('done');
    }catch(err){
        console.log(err);
    }
    
}


let rating = 0; // Variable to store the rating value

function editRating() {
 
// alert('clicked');
const stars = document.getElementsByClassName('starClass');
const editBtn =  document.getElementById('btnEditsub');
const ratingContainer = document.querySelector('.rating');
editBtn.disabled = true;
editBtn.style.visibility = 'hidden';
// ratingContainer.removeChild(editBtn);
for (let i = 0; i < stars.length; i++) {
    stars[i].classList.remove('editable');
    // stars[i].addEventListener('mouseenter', changeStar);
    //  stars[i].addEventListener('focus', (event)=>{
    //     const star = event.target;
    //     const index = Array.from(star.parentNode.children).indexOf(star);
    //     console.log(index+1);
    //     for(let i = 0; i<5; i++){
    //         if((6 - rating) <= i+1){
    //             stars[4 - i].style.color = '#E01F54';
    //         }else{
    //             stars[4 - i].style.color = 'none';
    //         }
             
    //     }
    //  });
    stars[i].name = 'star-outline';
    stars[i].addEventListener('click', (event)=>{
        const star = event.target;
        const index = Array.from(star.parentNode.children).indexOf(star);

        rating = index + 1; // Update the rating value
        console.log(rating);
        for(let i = 0; i<5; i++){
            if((6 - rating) <= i+1){
                stars[4 - i].name = 'star';
            }else{
                stars[4 -i].name = 'star-outline';
            }
             
        }
    });
}

const submitButton = document.createElement('button');
submitButton.classList.add('btnsub');
submitButton.textContent = 'Submit';
submitButton.name = 'submitRating';
submitButton.addEventListener('click', submitRating);


ratingContainer.appendChild(submitButton);

}

function setRating(event) {
const star = event.target;
const index = Array.from(star.parentNode.children).indexOf(star);

rating = index + 1; // Update the rating value
console.log(rating);
for(let i = 0; i<rating; i++){
    stars[i].name = 'star';
}
}

function submitRating() {
if (rating > 0) {
    //alert('submit');
    try{

        
        console.log(U_ID);
        console.log(G_ID);
        const xhr = new XMLHttpRequest();
        const url = 'updateRating.php?rating='+rating+'&user_Id='+U_ID+'&game_id='+G_ID; // Replace with your server-side endpoint URL

        xhr.open('GET', url , true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function () {
            if (xhr.status === 200) {
            console.log('Rating updated successfully!');
            } else {
            console.error('Error updating rating:', xhr.status);
            }
        };

        const data = JSON.stringify({ rating: rating });
        xhr.send();
        alert('Rating Updated!');
        window.location.href = 'view_games.php?id='+G_ID;
    }catch(err){
        console.log(err);
    }
   
    // xhr.send(data);
    
} else {
    alert('Please select a rating before submitting.');
}
}
