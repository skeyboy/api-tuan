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
