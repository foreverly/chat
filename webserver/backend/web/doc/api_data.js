define({ "api": [
  {
    "type": "post",
    "url": "/v1/banners/list",
    "title": "轮播图列表",
    "name": "list",
    "group": "Banner",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>获取轮播图列表</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "number",
            "description": "<p>页码（可不填默认1）</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "size",
            "description": "<p>每页数量</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "请求示例",
          "content": "{\n     \"numer\" : 1,\n     \"size\":3\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功返回",
          "content": "{\n\t  \"code\": 200,\n\t  \"msg\": \"success\",\n\t  \"data\": [\n\t    {\n\t      \"id\": \"1\",\n\t      \"banner_name\": \"1\",\n\t      \"img_url\": \"1\",\n\t      \"jump_url\": \"1\"\n\t    },\n\t    ...\n\t  ]\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/banners/list"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/BannerController.php",
    "groupTitle": "Banner"
  },
  {
    "type": "post",
    "url": "/v1/feedbacks/do?token=",
    "title": "意见反馈",
    "name": "do",
    "group": "Feedback",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>意见反馈 如果已登录则链接上带上token 否则不带</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tag_name",
            "description": "<p>反馈的标签，以逗号隔开</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>反馈的内容</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "请求示例",
          "content": "{\n     \"tag_name\":'界面太丑,流程繁琐', // 可以为空\n     \"content\":'我就吐个槽^_^' // 必填\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功返回",
          "content": "{\n\t  \"code\": 200,\n\t  \"msg\": \"success\",\n\t  \"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/feedbacks/do"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/FeedbackController.php",
    "groupTitle": "Feedback"
  },
  {
    "type": "post",
    "url": "/v1/msgs/send",
    "title": "发送验证码",
    "name": "send",
    "group": "Msg",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>发送手机验证码</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "请求示例",
          "content": "{\n     \"mobile\" : '13333333333'\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回结果",
          "content": "{\n     \"code\" : 200,\n     \"data\" : {\n     \t\"code\":\"123456\",\n     \t\"request_time\":\"2017-05-05 00:00:00\",\n     \t\"msg_content\":\"【贷理通】您的验证码为123456，请在10分钟内完成操作。如非本人，请忽略。\",\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/msgs/send"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/MsgController.php",
    "groupTitle": "Msg"
  },
  {
    "type": "post",
    "url": "/v1/users/apply",
    "title": "立即申请",
    "name": "apply",
    "group": "Product",
    "version": "1.0.0",
    "permission": [
      {
        "name": "已经登录的用户"
      }
    ],
    "description": "<p>点击立即申请时调用，提交前检查基本资料是否填写完成，否则弹出完善资料窗口调用users/set接口完善</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>登录凭证,通过Headers传输，key:&quot;Authorization&quot;，value:&quot;Bearer token&quot;，token为你要传的token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Body参数",
          "content": "{\n     \"id\" : 1,\n     \"apply_money\" : 6000, // 申请金额\n     \"apply_long\" : \"6月\", // 申请期限\n}",
          "type": "json"
        }
      ]
    },
    "header": {
      "examples": [
        {
          "title": "Header参数",
          "content": "{\n     \"Authorization\" : \"Bearer quWFuFF-O_PEWwGl3AlzKX2Fo8p5WbVK_1502618626\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回结果",
          "content": "{\n     \"code\" : 200,\n     \"status\" : 'success',\n     \"data\" : {\n     \t...\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/apply"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/v1/products/info",
    "title": "产品详情",
    "name": "info",
    "group": "Product",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>获取产品详情</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>产品id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功返回",
          "content": "{\n\t  \"code\": 200,\n\t  \"msg\": \"success\",\n\t  \"data\": {\n\t      \"product_id\": \"1\",// ID\n\t      \"title\": \"1\", // 标题\n\t      \"sub_title\": \"1\", // 宣传语、简要标题\n\t      \"logo_url\": \"1\", // 产品logo\n\t      \"product_url\": \"1\", // H5跳转地址\n\t      \"apply_num\": \"1\", // 申请数量\n\t      \"apply_eligible\": \"1\", // 申请条件\n\t      \"apply_process\": [\n\t      \t{\n\t      \t\t'icon':'1.jpg',\n\t      \t \t'name':'银行卡认证'\n\t        }, \n\t        ...\n\t        {\n\t      \t\t'icon':'4.jpg',\n\t      \t \t'name':'芝麻信用认证'\n\t        }\n\t      ],// 申请流程\n\t      \"tag_list\": [\n\t      \t{\n\t      \t\t'icon':'1.jpg',\n\t      \t \t'tag_name':'小额贷'\n\t        }, \n\t        ...\n\t        {\n\t      \t\t'icon':'4.jpg',\n\t      \t \t'tag_name':'青年贷'\n\t        }\n\t      ],// 申请流程\n\t      \"fastest_lending_time\": \"1\", // 最快放款时间1小时\n\t      \"product_info\": \"1\", // 所需材料\n\t      \"rate_min\": \"1\", // 最小利率\n\t      \"rate_max\": \"1\", // 最高利率\n\t      \"rate_type\": \"1\", // 利率类型 1为月利率2日利率\n\t      \"default_rate\": \"1\", // 参考利率 用于计算\n\t      \"date_min\": \"1\", // 最小期限\n\t      \"date_max\": \"1\", // 最大期限\n\t      \"date_type\": \"1\", // 期限类型 1月2日\n\t      \"default_date\": \"1\", // 默认显示的期限 用于计算\n\t      \"date_list\": [1,3,5,7], // 贷款期限列表 \n\t      \"loan_min\": \"500\", // 最小额度\n\t      \"loan_max\": \"15000\", // 最高额度\n\t      \"default_loan_money\": \"10000\", // 默认 展示的额度 用于计算\n\t      \"audit_info\": \"1\", // 审核条件\n\t      \"jump_type\": \"1\", // 跳转类型 1H5，0原生\n\t      \"customer_service_tel\": \"1\", // 客服电话\n\t      \"process_phone\": \"1\", // 申请进度电话\n\t      \"process_check_url\": \"1\", // 审核进度查询地址\n\t      \"platform\": \"1\", // 借贷平台\n\t      \"help_url\": \"1\", // 帮助中心\n\t      \"activity_url\": \"\", // 活动地址 \n\t      \"repayment_info\": \"按月还款，等额本息\", // 还款说明 \n\t      ...\n\t  }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/products/info\n{\n     \"id\" : 1 // \n}"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/ProductsController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/v1/products/list",
    "title": "产品列表",
    "name": "list",
    "group": "Product",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>获取产品列表</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "number",
            "description": "<p>页码(默认1)</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "size",
            "description": "<p>每页数量(默认10)</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "tag_id",
            "description": "<p>分类id</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "loan_min",
            "description": "<p>最小范围</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "loan_max",
            "description": "<p>最大范围</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "order",
            "description": "<p>排序方式 不填或0为默认排序，1：按贷款利率，2：按贷款额度</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求示例",
          "content": "{\n     \"numer\" : 1,\n     \"size\":3, \n     \"tag_id\":1,  // 分类id\n     \"loan_min\":500, // 不填为不限制 \n     \"loan_max\":5000, // 不填为不限制\n     \"date\":2, // 一键匹配时需传该参数，0为1个月以内，1为1个月，2为2个月以此类推\n     \"one_key\":1,// 一键匹配请求接口时必填，否则不填或传0\n     \"money\":5000,// 一键匹配请求接口时必填，否则不填或传0\n     \"order\":0, // 不填或0为默认排序，\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功返回",
          "content": "{\n\t  \"code\": 200,\n\t  \"msg\": \"success\",\n\t  \"data\": [\n\t    {\n\t      \"product_id\": \"1\", \n\t      \"title\": \"信用贷\", // 产品名称\n\t      \"sub_title\": \"0门槛，首借享3天免息\", // 简要描述 宣传语\n\t      \"logo_url\": \"1.jpg\", // 产品图标\n\t      'platform':'用钱宝', // 借贷平台\n\t      \"rate_type\": \"1\", // 利率类型 1为月2为日\n\t      \"default_rate\": \"0.5\", // 默认显示的利率\n\t      \"loan_min\": \"500\", // 最小额度\n\t      \"loan_max\": \"15000\", // 最高额度\n\t      \"jump_type\": \"1\", // 跳转类型，0原生1h5\n\t      \"product_url\":'' // 跳转类型为h5时使用\n\t    },\n\t    ...\n\t  ]\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/products/list"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/ProductsController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/v1/tags/list",
    "title": "产品分类列表",
    "name": "list",
    "group": "Tag",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>获取产品列表</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "position",
            "description": "<p>不传或传1为查询首页的tag_list，传2查询列表页</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求参数示例",
          "content": "{\n     \"position\" : 1 \n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功返回",
          "content": "{\n\t  \"code\": 200,\n\t  \"msg\": \"success\",\n\t  \"data\": [\n\t    {\n\t      \"id\": \"1\",\n\t      \"tag_name\": \"1\",// 分类名称\n\t      \"default_loan_money\": \"1\",// 默认金额\n\t      \"icon\": \"1\", // 图标\n\t      \"info\": \"1\", // 描述信息\n\t      \"activity_url\": \"1\",\n\t      \"loan_range\": \"1\", // 贷款范围\n\t      \"sort\": \"1\", // 排序\n\t      \"status\": \"1\", // 状态\n\t    },\n\t    ...\n\t  ]\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/tags/list"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/TagController.php",
    "groupTitle": "Tag"
  },
  {
    "type": "get",
    "url": "/v1/users/applications",
    "title": "我的申请",
    "name": "applications",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "已经登录的用户"
      }
    ],
    "description": "<p>进入我的申请时调用</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>登录凭证,通过Headers传输，key:&quot;Authorization&quot;，value:&quot;Bearer token&quot;，token为你要传的token</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "Header参数",
          "content": "{\n     \"Authorization\" : \"Bearer quWFuFF-O_PEWwGl3AlzKX2Fo8p5WbVK_1502618626\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回结果",
          "content": "{\n     \"code\" : 200,\n     \"status\" : 'success',\n     \"data\" : [\n     \t\t{\n\t             \t\"id\": \"1\", // 申请ID\n\t             \t\"product_id\": \"59\", // 产品ID\n\t              \t\"title\": \"小额钱袋\", // 产品名称\n\t              \t\"sub_title\": \"申请5分钟，凭身份证最高可借20万！\", // 简要标题，简要说明\n\t             \t\"logo_url\": \"https://odxuw4gvy.qnssl.com/5064d90cef38721c0b8d0021db48a819.png\",// 产品图标\n\t              \t\"apply_money\": \"6000\", // 申请金额\n\t               \t\"apply_long\": \"5月\", // 申请期限\n\t            },\n\t            {\n\t             \t\"id\": 2,\n\t             \t\"product_id\": \"50\",\n\t              \t\"title\": \"51人品贷\",\n\t              \t\"sub_title\": \"有信用卡就能贷\",\n\t               \t\"logo_url\": \"https://odxuw4gvy.qnssl.com/854a7b2bbd0502a83273fa3eb3a70c90.png\",\n\t                \"apply_money\": \"10000\", // 申请金额\n\t                \"apply_long\": \"12月\", // 申请期限\n\t            },\n\t            ...// 更多\n\t        ]\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/applications"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/v1/users/browses",
    "title": "浏览记录",
    "name": "browses",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "已经登录的用户"
      }
    ],
    "description": "<p>进入浏览记录时调用</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>登录凭证,通过Headers传输，key:&quot;Authorization&quot;，value:&quot;Bearer token&quot;，token为你要传的token</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "Header参数",
          "content": "{\n     \"Authorization\" : \"Bearer quWFuFF-O_PEWwGl3AlzKX2Fo8p5WbVK_1502618626\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回结果",
          "content": "{\n     \"code\" : 200,\n     \"status\" : 'success',\n     \"data\" : {\n     \t\"2017-08-09\":[\n     \t\t{\n\t             \t\"product_id\": \"59\", // 产品ID\n\t              \t\"title\": \"小额钱袋\", // 产品名称\n\t              \t\"sub_title\": \"三分钟申请\", // 简要标题，简要说明\n\t             \t\"logo_url\": \"https://odxuw4gvy.qnssl.com/5064d90cef38721c0b8d0021db48a819.png\",// 产品图标\n\t              \t\"loan_min\": \"1000\", // 最低贷款金额\n\t               \t\"loan_max\": \"2000\", // 最高贷款金额\n\t                \"rate_type\": \"2\", // 默认利率类型，1为月利率，2为日利率\n\t                \"default_rate\": \"0.10\", // 默认显示的利率\n\t                \"apply_num\": \"0\" // 申请成功人数\n\t            },\n\t            {\n\t             \t\"product_id\": \"50\",\n\t              \t\"title\": \"51人品贷\",\n\t              \t\"sub_title\": \"有信用卡就能贷\",\n\t               \t\"logo_url\": \"https://odxuw4gvy.qnssl.com/854a7b2bbd0502a83273fa3eb3a70c90.png\",\n\t                \"loan_min\": \"3000\",\n\t                \"loan_max\": \"100000\",\n\t                \"rate_type\": \"1\",\n\t                \"default_rate\": \"0.37\",\n\t                \"apply_num\": \"3415\"\n\t            },\n\t            ...// 更多\n\t        ],\n\t        \"2017-08-10\":[\n        \t\t...// 同上\n\t\t\t]\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/browses"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/v1/users/info",
    "title": "获取用户信息",
    "name": "info",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>获取用户信息,返回用户详细的全部信息</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>登录凭证,通过Headers传输，key:&quot;Authorization&quot;，value:&quot;Bearer token&quot;，token为你要传的token</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "Header参数",
          "content": "{\n     \"Authorization\" : \"Bearer quWFuFF-O_PEWwGl3AlzKX2Fo8p5WbVK_1502618626\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回结果",
          "content": "{\n     \"code\" : 200,\n     \"status\" : 'success',\n     \"data\" : {\n     \t\"basic_info\": {// 基本信息\n\t\t      \"finish\": 1, // 是否填写完成 0：未完成，1：已完成\n\t\t      \"list\": { // 所属的列表\n\t\t        \"user_type\": \"2\", // 职业身份\n\t\t        \"real_name\": \"zhangsan\", // 姓名\n\t\t        \"idcard\": \"360733199111100000\", // 身份证\n\t\t        \"mobile\": \"15970651243\", // 手机号\n\t\t        \"sex\": \"男\" // 性别\n\t\t      }\n\t\t    },\n\t\t    \"personal_credit\": { // 个人资信\n\t\t      \"finish\": 0, // 完成情况\n\t\t      \"list\": {\n\t\t        \"education\": \"\", // 文化程度\n\t\t        \"has_creditcard\": \"\", // 有无信用卡 \n\t\t        \"credit_situation\": \"\", // 两年内信用记录\n\t\t        \"success_loan\": \"\", // 有无成功贷款记录\n\t\t        \"has_taobao\": \"\", // 是否有实名淘宝账号\n\t\t        \"has_reserfund\": \"\", // 连续半年缴纳公积金\n\t\t        \"has_resersecur\": \"\", // 连续半年缴纳社保\n\t\t        \"loan_for\": \"\", // 贷款用途\n\t\t      }\n\t\t    },\n\t\t\t\"work_info\": { // 工作情况\n\t\t      \"finish\": 0, // 完成情况\n\t\t      \"list\": {\n\t\t        \"company_name\": \"\", // 工作单位名称\n\t\t        \"company_city\": \"\", // 公司所在城市\n\t\t        \"company_address\": \"\", // 公司详细地址\n\t\t        \"company_type\": \"上市公司2\", // 当前所在公司类型\n\t\t        \"company_entry_date\": \"\", // 当前公司入职日期\n\t\t        \"current_long\": \"\", // 当前公司工作年限\n\t\t        \"income_patton\": \"\", // 工资发放形式\n\t\t        \"income\": \"\" // 月收入\n\t\t      }\n\t\t    },\n\t\t    \"operation_info\": { // 企业经营情况\n\t\t      \"finish\": 0, // 完成情况\n\t\t      \"list\": {\n\t\t        \"business_identity\": \"\", // 您的企业身份\n\t\t        \"business_stock\": \"\", // 您在企业的股份\n\t\t        \"business_real_address\": \"\", // 公司所在城市\n\t\t        \"business_type\": \"\", // 经营企业类型\n\t\t        \"business_license_time\": \"\", // 营业执照时间\n\t\t        \"operating_years\": \"\" // 企业经营年限\n\t\t      }\n\t\t    },\n\t\t    \"school_info\": { // 在校信息\n\t\t      \"finish\": 0, // 完成情况\n\t\t      \"list\": {\n\t\t        \"school_name\": \"\", // 学校名称\n\t\t        \"school_city\": \"\", // 学校所在城市\n\t\t        \"academic_starts_year\": \"\" // 入学年份\n\t\t      }\n\t\t    }\n\t\t    \"family_info\": { // 家庭及居住情况\n\t\t      \"finish\": 0, // 完成情况\n\t\t      \"list\": {\n\t\t        \"is_marry\": \"\", // 婚姻状况\n\t\t        \"city_code\": \"\", // 所在城市\n\t\t        \"full_address\": \"\" // 所在详细地址\n\t\t        \"addresidence_addressress\": \"\" // 户籍所在城市\n\t\t      }\n\t\t    }\n\t\t    \"other_contacts\": { // 其他联系人\n\t\t      \"finish\": 0, // 完成情况\n\t\t      \"list\": {\n\t\t        \"kin_name\": \"\", // 亲属姓名\n\t\t        \"kin_mobile\": \"\", // 亲属手机号码\n\t\t        \"contact_name\": \"\" // 紧急联系人\n\t\t        \"contact_mobile\": \"\" // 联系人手机号码\n\t\t      }\n\t\t    }\n\t\t    \"house_property\": { // 房产\n\t\t      \"finish\": 0, // 完成情况\n\t\t      \"list\": {\n\t\t        \"has_house\": \"\", // 名下房产\n\t\t      }\n\t\t    }\n\t\t    \"car_property\": { // 车产\n\t\t      \"finish\": 0, // 完成情况\n\t\t      \"list\": {\n\t\t        \"has_car\": \"\", // 名下车产\n\t\t      }\n\t\t    }\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/info"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/v1/users/login",
    "title": "用户登录",
    "name": "login",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>手机免密登录</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "type",
            "description": "<p>登录类型 0为短信登录，1为账密登录</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>验证码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "请求示例1(短信验证登录)",
          "content": "{\n     \"type\" : 0,\n     \"mobile\" : '13333333333',\n     \"code\":123456\n}",
          "type": "json"
        },
        {
          "title": "请求示例2(账号密码登录)",
          "content": "{\n     \"type\" : 1,\n     \"mobile\" : '13333333333',\n     \"password\" : '123456'\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功返回",
          "content": "{\n     \"code\" : 200,\n     \"status\":\"success\",\n     \"data\" : {\n     \t\"token\":\"ER1dxA1GxCHjEM0p1fmzGe\"\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/login"
      }
    ],
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "{\n     \"code\" : -1,\n     \"status\":\"false\",\n     \"msg\": \"验证码/密码错误\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "/v1/users/loginout",
    "title": "退出登录",
    "name": "loginout",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>退出登录</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>登录凭证,通过Headers传输，key:&quot;Authorization&quot;，value:&quot;Bearer token&quot;，token为你要传的token</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "Header参数",
          "content": "{\n     \"Authorization\" : \"Bearer quWFuFF-O_PEWwGl3AlzKX2Fo8p5WbVK_1502618626\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回结果",
          "content": "{\n     \"code\" : 200,\n     \"status\" : 'success',\n     \"data\" : {\n     \t...\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/loginout"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/v1/users/register",
    "title": "用户注册",
    "name": "register",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>手用户注册</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>验证码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invite_mobile",
            "description": "<p>邀请人手机（可选）</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "请求示例(短信注册)",
          "content": "{\n     \"mobile\" : '13333333333',\n     \"code\":123456,\n     \"invite_mobile\":13696363696,// (可不填)\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功返回",
          "content": "{\n     \"code\" : 200,\n     \"status\":\"success\",\n     \"data\" : {\n     \t\"token\":\"ER1dxA1GxCHjEM0p1fmzGe\"\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/register"
      }
    ],
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "{\n     \"code\" : -1,\n     \"status\":\"false\",\n     \"msg\": \"验证码错误\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/v1/users/report",
    "title": "浏览上报",
    "name": "report",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "已经登录的用户"
      }
    ],
    "description": "<p>进入产品详情时，如果用户已登录则调用</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>登录凭证,通过Headers传输，key:&quot;Authorization&quot;，value:&quot;Bearer token&quot;，token为你要传的token</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>浏览贷款产品的ID 必填</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求参数",
          "content": "{\n     \"id\" : 1\n}",
          "type": "json"
        }
      ]
    },
    "header": {
      "examples": [
        {
          "title": "Header参数",
          "content": "{\n     \"Authorization\" : \"Bearer quWFuFF-O_PEWwGl3AlzKX2Fo8p5WbVK_1502618626\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回结果",
          "content": "{\n     \"code\" : 200,\n     \"status\" : 'success',\n     \"data\" : []\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/report"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/v1/users/set",
    "title": "保存用户信息",
    "name": "set",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>保存用户信息</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>登录凭证,通过Headers传输，key:&quot;Authorization&quot;，value:&quot;Bearer token&quot;，token为你要传的token</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "user_type",
            "description": "<p>职业身份</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "real_name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "idcard",
            "description": "<p>身份证</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sex",
            "description": "<p>性别</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "company_name",
            "description": "<p>工作单位名称</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "company_city",
            "description": "<p>公司所在城市</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "company_address",
            "description": "<p>公司详细地址</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "company_type",
            "description": "<p>当前所在公司类型</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "company_entry_date",
            "description": "<p>当前公司入职日期</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "current_long",
            "description": "<p>当前公司工作年限</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "income",
            "description": "<p>月收入</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "income_patton",
            "description": "<p>月收入形式，如银行代发</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "education",
            "description": "<p>文化程度</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "has_creditcard",
            "description": "<p>是否有信用卡</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "credit_situation",
            "description": "<p>信用情况</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "success_loan",
            "description": "<p>是否有成功贷款记录</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "has_taobao",
            "description": "<p>是否有实名认证的淘宝账号</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "has_reserfund",
            "description": "<p>连续6个月以上缴纳公积金</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "has_resersecur",
            "description": "<p>连续六个月以上缴纳社保</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "loan_for",
            "description": "<p>贷款用途</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_identity",
            "description": "<p>您的企业身份</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_stock",
            "description": "<p>您在企业的股份</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_real_address",
            "description": "<p>公司所在城市</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_type",
            "description": "<p>经营企业类型</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_license_time",
            "description": "<p>营业执照时间</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "operating_years",
            "description": "<p>企业经营年限</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "school_name",
            "description": "<p>学校名称</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "school_city",
            "description": "<p>学校所在城市</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "academic_starts_year",
            "description": "<p>入学年份</p>"
          }
        ]
      }
    },
    "header": {
      "examples": [
        {
          "title": "Header参数",
          "content": "{\n     \"Authorization\" : \"Bearer quWFuFF-O_PEWwGl3AlzKX2Fo8p5WbVK_1502618626\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回结果",
          "content": "{\n     \"code\" : 200,\n     \"status\" : 'success',\n     \"data\" : {\n     \t...\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/set"
      }
    ],
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/v1/users/set-password",
    "title": "设置密码",
    "name": "setPassword",
    "group": "User",
    "version": "1.0.0",
    "permission": [
      {
        "name": "anyone"
      }
    ],
    "description": "<p>设置密码</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "check_password",
            "description": "<p>确认密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>登录凭证,通过Headers传输，key:&quot;Authorization&quot;，value:&quot;Bearer token&quot;，token为你要传的token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求示例(设置密码)",
          "content": "{\n     \"password\":'123456',\n     \"check_password\":'123456'\n}",
          "type": "json"
        }
      ]
    },
    "header": {
      "examples": [
        {
          "title": "Header参数",
          "content": "{\n     \"Authorization\" : \"Bearer quWFuFF-O_PEWwGl3AlzKX2Fo8p5WbVK_1502618626\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>状态码</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>返回参数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功返回",
          "content": "{\n     \"code\" : 200,\n     \"status\":\"success\",\n     \"data\" : {\n     \t\"token\":\"ER1dxA1GxCHjEM0p1fmzGe\"\n     }\n}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "127.0.0.1:8888/v1/users/set-password"
      }
    ],
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "{\n     \"code\" : -1,\n     \"status\":\"error\",\n     \"msg\": \"验证码/密码错误\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "../../../api/modules/v1/controllers/UserController.php",
    "groupTitle": "User"
  }
] });
