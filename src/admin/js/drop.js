var dropZone = document.getElementById('drop-zone');
var preview = document.getElementById('preview');
var fileInput = document.getElementById('file-input');


//ドロップされている色変更
dropZone.addEventListener('dragover', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#e1e7f0';
}, false);


//枠から離れた時、色戻る
dropZone.addEventListener('dragleave', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#ffffff';
}, false);




fileInput.addEventListener('change', function () {
    previewFile(this.files[0]);
});




dropZone.addEventListener('drop', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#ffffff'; //背景色を白に戻す
    var files = e.dataTransfer.files; //ドロップしたファイルを取得
    fileInput.files = files; //inputのvalueをドラッグしたファイルに置き換える。
    previewFile(files[0]);
}, false);




function previewFile(file) {
    /* FileReaderで読み込み、プレビュー画像を表示。 */
    var fr = new FileReader();
    fr.readAsDataURL(file);
    fr.onload = function() {
        var img = document.createElement('img');
        img.classList.add("image")
        img.setAttribute('src', fr.result);
        preview.innerHTML = '';
        preview.appendChild(img);
    };
}