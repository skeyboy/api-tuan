#相册
####创建相册

- 接口地址：/album/create
- 接口形式：post 
- 输入参数：apiToken 用户的token  ， albumName 相册名称 ， private 0表示私有 1 表示公开 默认是1
- 输出参数：
- curl调用示例：curl -X POST \
             http://127.0.0.1:1004/api/v1/album/create \
             -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
             -F api_token=91e65d721bc7fe4d4decd764c32d23db \
             -F albumName=11111 \
             -F private=1
*code* | *Description*

*0* | *成功*

```javascript
{
    "code": 0,
    "msg": "success",
    "data": []
}
```
####添加照片到相册

- 接口地址：/album/addPicToAlbum
- 接口形式：post 
- 输入参数：apiToken 用户的token  ， albumId 相册id ， pics 图片（用英文逗号连接多张图片地址）
- 输出参数：
- curl调用示例：curl -X POST \
             http://127.0.0.1:1004/api/v1/album/addPicToAlbum \
             -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
             -F api_token=91e65d721bc7fe4d4decd764c32d23db \
             -F albumId=1 \
             -F 'pics=1,2,3,4'
*code* | *Description*

*0* | *成功*

```javascript
{
    "code": 0,
    "msg": "success",
    "data": []
}
```