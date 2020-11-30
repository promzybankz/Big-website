// const container = document.getElementById('container').addEventListener('click',
//  loadData)


 const containerItem = document.getElementById('container-item')

    const xhr = new XMLHttpRequest();


xhr.onload = function(){
    if (this.status === 200){
        containerItem.innerHTML = xhr.responseText;
    } else{
        console.warn('Did not recieve 200 OK from response!')
    }
}

xhr.open('get', 'blogpost.html')
xhr.send()
