document.addEventListener('DOMContentLoaded', function () {
    let status = document.getElementById('status');
    let comment = document.getElementById('comment');
    status.addEventListener('change', function (){
        if(status.value == 3){
            comment.classList.add('block');
            comment.classList.remove('none');
        }else{
            comment.classList.add('none');
            comment.classList.remove('block');
        }
    })
})
