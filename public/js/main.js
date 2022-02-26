// 必須項目から未入力でフォーカスを外したときの処理
const requiredItems = document.getElementsByClassName('required-input');
const errorItems = document.getElementsByClassName('error-container');

for (let i = 0; i < requiredItems.length; i++) {
  requiredItems[i].addEventListener('click', {index: i, handleEvent: checkRequired});
}
function checkRequired(e) {
  // this.classList.toggle('error');
  this.style.background = "red";
  // const requiredErrorText = this.nextElementSibling;
  // requiredErrorText.classList.toggle('required-error-text');

  errorItems[this.index].style.display = 'block';
  // errorItems[i].addEventListener('click', () => {
  //   errorItems[i].style.color = 'red';
  // })
}