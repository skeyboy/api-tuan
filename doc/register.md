#注册
####注册

- 接口地址：/register/doReg
- 接口形式：post 
- 输入参数：userName 用户名     password 密码  
- 输出参数：   apiToken 用户的token
- curl调用示例：curl -X POST \
             http://127.0.0.1:1004/api/v1/register/doReg \
             -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
             -F userName=hanyun \
             -F password=12345
*code* | *Description*

*0* | *成功*

```javascript
{
    "code": 1,
    "msg": "success",
    "data": {
        "password": [
            "密码长度至少6位"
        ]
    }
}



{
    "code": 0,
    "msg": "success",
    "data": {
        "id": 1,
        "schoolId": 0,
        "userName": "hanyun",
        "mobile": "",
        "addTime": "",
        "avatar": "",
        "distictId": 0,
        "apiToken": "91e65d721bc7fe4d4decd764c32d23db"
    }
}
```


####院校列表


- 接口地址：/register/schoolList
- 接口形式：GET 
- 输入参数：
- 输出参数：
schoolList 校园列表： id 校园id    name 高校名称
- curl调用示例：curl -X GET \
             http://127.0.0.1:1004/api/v1/register/schoolList

*code* | *Description*

*0* | *成功*

```javascript
{
    "code": 0,
    "msg": "success",
    "data": [
        {
            "id": 1,
            "name": "北京市",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": [
                {
                    "id": 1,
                    "name": "北京大学",
                    "logo": "1",
                    "districtId": 1
                },
                {
                    "id": 2,
                    "name": "清华大学",
                    "logo": "",
                    "districtId": 1
                }
            ]
        },
        {
            "id": 2,
            "name": "天津市",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": [
                {
                    "id": 3,
                    "name": "天津职业技术师范大学",
                    "logo": "",
                    "districtId": 2
                }
            ]
        },
        {
            "id": 3,
            "name": "河北省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 4,
            "name": "山西省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 5,
            "name": "内蒙古自治区",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 6,
            "name": "辽宁省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 7,
            "name": "吉林省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 8,
            "name": "黑龙江省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 9,
            "name": "上海市",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 10,
            "name": "江苏省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 11,
            "name": "浙江省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 12,
            "name": "安徽省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 13,
            "name": "福建省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 14,
            "name": "江西省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 15,
            "name": "山东省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 16,
            "name": "河南省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 17,
            "name": "湖北省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 18,
            "name": "湖南省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 19,
            "name": "广东省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 20,
            "name": "广西壮族自治区",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 21,
            "name": "海南省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 22,
            "name": "重庆市",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 23,
            "name": "四川省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 24,
            "name": "贵州省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 25,
            "name": "云南省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 26,
            "name": "西藏自治区",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 27,
            "name": "陕西省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 28,
            "name": "甘肃省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 29,
            "name": "青海省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 30,
            "name": "宁夏回族自治区",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 31,
            "name": "新疆维吾尔自治区",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 32,
            "name": "台湾省",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 33,
            "name": "香港特别行政区",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 34,
            "name": "澳门特别行政区",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 35,
            "name": "海外",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        },
        {
            "id": 36,
            "name": "其他",
            "level": 1,
            "usetype": 3,
            "upid": 0,
            "displayorder": 0,
            "schoolList": []
        }
    ]
}
```