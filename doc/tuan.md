#社团

####创建社团

- 接口地址：/tuan/create
- 接口形式：post 
- 输入参数：api_token 用户的token  ， name 社团名称 ， logo logo地址 ， category_id 分类id ，description 社团的简单描述
- 输出参数：
- curl调用示例：curl -X POST \
             http://127.0.0.1:1004/api/v1/tuan/create \
             -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
             -F api_token=91e65d721bc7fe4d4decd764c32d23db \
             -F name=1 \
             -F logo=1 \
             -F category_id=1 \
             -F description=111111
*code* | *Description*

*0* | *成功*

```javascript
{
    "code": 1,
    "msg": "该院校社团已经存在！换个名称试试！"
}
```


####社团分类

- 接口地址：/tuan/categoryList
- 接口形式：get 
- 输入参数：
- 输出参数：
- curl调用示例：curl -X GET \
             http://127.0.0.1:1004/api/v1/tuan/categoryList
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
                "name": "分类1"
            }
        ],
        "firstPageUrl": "http://127.0.0.1:1004/api/v1/tuan/categoryList?page=1",
        "from": 1,
        "lastPage": 1,
        "lastPageUrl": "http://127.0.0.1:1004/api/v1/tuan/categoryList?page=1",
        "nextPageUrl": "",
        "path": "http://127.0.0.1:1004/api/v1/tuan/categoryList",
        "perPage": 15,
        "prevPageUrl": "",
        "to": 1,
        "total": 1
    }
}
```



####社团列表

- 接口地址：/tuan/list
- 接口形式：get 
- 输入参数：
- 输出参数：id 社团id ，name 社团名称 ， logo 社团 logo ，categoryId 社团分类id ， description 社团简介
- curl调用示例：curl -X GET \
             http://127.0.0.1:1004/api/v1/tuan/list
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
                "name": "1",
                "schoolId": 1,
                "userId": 1,
                "logo": "1",
                "addTime": 1515381289,
                "categoryId": 1,
                "description": "111111"
            }
        ],
        "firstPageUrl": "http://127.0.0.1:1004/api/v1/tuan/list?page=1",
        "from": 1,
        "lastPage": 1,
        "lastPageUrl": "http://127.0.0.1:1004/api/v1/tuan/list?page=1",
        "nextPageUrl": "",
        "path": "http://127.0.0.1:1004/api/v1/tuan/list",
        "perPage": 15,
        "prevPageUrl": "",
        "to": 1,
        "total": 1
    }
}
```



####创建社团相册

- 接口地址：/tuan/album/create
- 接口形式：post 
- 输入参数：
- 输出参数：
- curl调用示例：curl -X POST \
             http://127.0.0.1:1004/api/v1/tuan/album/create \
             -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
             -F name=1111 \
             -F api_token=91e65d721bc7fe4d4decd764c32d23db
*code* | *Description*

*0* | *成功*

```javascript
{
    "code": 0,
    "msg": "success",
    "data": []
}
```


####设置社团相册封面

- 接口地址：/tuan/album/cover
- 接口形式：post 
- 输入参数：api_token token ， cover 封面地址 ， albumId 相册id
- 输出参数：
- curl调用示例：curl -X POST \
             http://127.0.0.1:1004/api/v1/tuan/album/cover \
             -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
             -F api_token=49e58778548fdf8cef7796d66cceeb2d \
             -F cover=1111 \
             -F albumId=1
*code* | *Description*

*0* | *成功*

```javascript
{
    "code": 1,
    "msg": "你没有这个权限！"
}
```