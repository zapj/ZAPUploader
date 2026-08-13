# ZAPUploader
文件 / 目录拖拽上传插件，零依赖，**样式已内置在 JS 中**，无需再引入 `zapuploader.css`（插件首次实例化时自动注入 `<style>`）。

> 兼容旧用法：仍可继续使用 `zapuploader.css`，通过 `injectCSS: false` 关闭自动注入即可。


```javascript
var upload = new ZAPUploader('#drop-area',{
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
        // directoryUpload:true, //upload dir  上传目录（开启 autoUpload 后目录读取完成会自动上传，也可手动调用 startUpload();）
        // queueSize: 3,        // 同时上传的并发数（默认 5）
        // injectCSS: false,    // 关闭内置样式注入（默认 true）
        // withCredentials: true, // 跨域请求携带凭证
        // progress:function(percent){
        //     $('.progress-bar').css('width',percent + '%');
        // }
    });
```

### 多个实例（同页面多个上传区域）
同一个页面可以创建多个实例，彼此状态、进度、并发队列完全独立；内置样式只注入一次，全局监听也不会重复绑定。

```javascript
var uploader1 = new ZAPUploader('#drop-area-1', { url: 'upload.php' });
var uploader2 = new ZAPUploader('#drop-area-2', { url: 'upload.php', directoryUpload: true });

// 所有实例统一管理
console.log(ZAPUploader.instances);

// 销毁某个实例（移除监听器、清空状态）
uploader2.destroy();
```

```html
<div id="drop-area-1" class="zapUploader text-center">...</div>
<div id="drop-area-2" class="zapUploader text-center">...</div>
```

> 注意：传入 `.class` 选择器时，会为匹配到的每个元素分别创建实例。

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

