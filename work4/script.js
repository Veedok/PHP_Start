//Логика работы модального окна
let b = document.getElementById("modal");
        document.addEventListener("click", click);
        function click(){
            if(event.target.src){
                let img = document.createElement('img');
                img.src = event.target.src;
                img.className = "img_big";
                if ( b.classList.contains("off")){
                    b.classList.add("on");
                    b.classList.remove("off");
                    b.prepend(img); 
                } else {
                    let del = document.querySelector(".img_big");
                    del.remove();
                    b.classList.add("off");
                    b.classList.remove("on");
                }
            }
        };
//Логика работы с json файлом и построение DOM благодаря полученному файлу
        (async () => {
            const response = await fetch('data.json')
            const result = await response.json()
            console.log(result);
            let content = document.querySelector(".content");
            result.forEach(element => {
                let myImg = `<div class="item"><img class="product_img" src=img/${element} alt="img"></div>`
                content.insertAdjacentHTML('afterbegin', myImg);
                
            });
        })()