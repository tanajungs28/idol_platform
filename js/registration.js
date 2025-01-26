// ユーザー登録ボタン押したときの動き
$("#reg_btn").on("click",function(){
    console.log("ユーザー登録ボタン押下")
    location.href = "./user_reg.php";
})

// ユーザー登録ボタン押したときの動き
$("#list_btn").on("click",function(){
    console.log("ユーザー一覧ボタン押下")
    location.href = "./user_list.php";
})

// ユーザー登録ボタン押したときの動き
$("#timeline_btn").on("click",function(){
    console.log("タイムラインボタン押下")
    location.href = "./timeline.php";
})

// ユーザー登録ボタン押したときの動き
$("#back_btn").on("click",function(){
    console.log("戻るボタン押下")
    location.href = "./index.php";
})

// ミートボールの動き
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".meatball");
        buttons.forEach(button => {
            button.addEventListener("click", () => {
                console.log("ミートボールボタンを押しました")
                const menu = button.nextElementSibling; // ボタンの次の要素（menu-container）
                menu.classList.toggle("active"); // 表示/非表示を切り替える
            });
        });
    });
// })
