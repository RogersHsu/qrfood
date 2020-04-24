/**
 * 用於表單驗證
 * 參考網址：https://getbootstrap.com/docs/4.0/components/forms/#custom-styles
 * 最後修改日期:2020/04/08
 */
// (function () {
//     'use strict';
//     window.addEventListener('load', function () {
//         var viewForm = document.getElementById('form_view');
//         var viewSubmit = document.getElementById('btn_view_submit');
//
//
//         formValid(viewForm, viewSubmit);
//
//     }, false);
// })();

/**
 * 驗證表單的欄位是否全部符合格式,
 * 正確的話:送給後端請求
 * 錯誤的話：不做任何事情
 * @param form 被驗證的表單
 * @param submit 確認修改的按鈕
 */
// function formValid(form, submit) {
//     submit.addEventListener('click', function (event) {
//         if (form.checkValidity() === false) {
//             event.preventDefault();
//             event.stopPropagation();
//             console.log("Failed");
//         } else {
//             console.log("success");
//         }
//     });
// }
