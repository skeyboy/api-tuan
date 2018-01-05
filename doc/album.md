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

####获得用户相册列表

- 接口地址：/album/userAlbum
- 接口形式：get 
- 输入参数：api_token
- 输出参数：currentPage 当前页面 lastPage 最后一页页码数
- curl调用示例：curl -X GET \
             'http://127.0.0.1:1004/api/v1/album/userAlbum?api_token=91e65d721bc7fe4d4decd764c32d23db'
*code* | *Description*

*0* | *成功*

```javascript
{
    "code": 0,
    "msg": "success",
    "data": {
        "currentPage": 1,
        "data": [
            {
                "id": 1,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 2,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 3,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 4,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 5,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 6,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 7,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 8,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 9,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 10,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 11,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 12,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 13,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            },
            {
                "id": 14,
                "userId": 1,
                "cover": "",
                "name": "11111",
                "addTime": "",
                "private": 1
            }
        ],
        "firstPageUrl": "http://127.0.0.1:1004/api/v1/album/userAlbum?page=1",
        "from": 1,
        "lastPage": 1,
        "lastPageUrl": "http://127.0.0.1:1004/api/v1/album/userAlbum?page=1",
        "nextPageUrl": "",
        "path": "http://127.0.0.1:1004/api/v1/album/userAlbum",
        "perPage": 15,
        "prevPageUrl": "",
        "to": 14,
        "total": 14
    }
}
```