# ZAPUploader
Uploader 




```javascript
var upload = new ZAPUploader('drop-area',{
        url: 'http://127.0.0.1/uploader/upload.php',
        allowedExtensions: '.jpg|.png|.jpeg',
        // acceptedFiles: 'image/png,image/jpg,image/jpeg',
        skipInvalidFile: true,
        preview:function(file){
            console.log(file);
        },
        previewTemplate:document.querySelector('.zap-preview-template'),
        success:function(i,response){
            console.log(i,response)
        },
        processing:function(file){
             // console.log("processing",file);
        },
        complete:function(){
        
             console.log('complete');
        },
        progress:function(total,fileNumber,percent,ff){        
             // ff.querySelector('.zap-file-size').innerHTML = '已完成' + percent.toFixed(2);
        },
        addfile:function(file){
            //console.log('addfile',file);
        },
        addedfile:function(file,index){}
        // directoryUpload:true, //upload dir  上传目录需要手动调用startUpload();
        // progress:function(percent){
        //     $('.progress-bar').css('width',percent + '%');
        // }
    });
```

### 上传文件
```html
<div id="drop-area" class="zapUploader text-center " >

    <p>请选择要上传的图片</p>

    <input type="file" id="uploader" multiple accept="image/*" >
    <label class="btn btn-primary m-2" for="uploader">选择图片</label>
    <div class="zap-message mb-2"></div>
    <div class="progress zap-progress mb-2" style="display: none;height: 2px">
        <div class="progress-bar zap-progress-bar" role="progressbar"  style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="zap-preview"  ></div>

</div>
```



### 自定义模板
```html
<div class="zap-preview-template">
    <div class="zap-file-details align-items-center row mb-2 bg-white border">

        <div class="col-auto">
            <div class="zap-thumbnails">
                <img class="zap-file-thumb" />
            </div>
        </div>
        <div class="col align-items-center">
            <span class="zap-file-name"></span><br/>
            <span class="zap-file-size"></span><br/>
            <span class="zap-file-progress"></span>
            <div class="progress zap-none zap-progress" style="height: 2px">
                <div class="progress-bar zap-file-progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>

    </div>
    <div class="zap-file-success-mark"><i class="fa fa-check-circle"></i> or <span>✔</span></div>
    <div class="zap-file-error-mark"><span>✘</span></div>
</div>
```

### 预览图
![预览图](https://raw.githubusercontent.com/zapj/ZAPUploader/main/screenshot.png)
![预览图](https://raw.githubusercontent.com/zapj/ZAPUploader/main/dir-upload.png)

