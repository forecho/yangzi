
/*
 *本插件原作者Vanadium,原文请移步前往http://vanadiumjs.com/查看
 *本插件由Mr.Think中文整理,Mr.Think的博客:http://MrThink.net/
 *转载及使用请务必注明原作者.
*/
$(function(){
	//必填项加红*,Mr.Think添加,原插件无
    $("input[class*=:required]").after("<span> *</span>")
});
 //弹出信息样式设置
Vanadium.config = {
    valid_class: 'rightformcss',//验证正确时表单样式
    invalid_class: 'failformcss',//验证失败时该表单样式
    message_value_class: 'msgvaluecss',//这个样式是弹出信息中调用值的样式
    advice_class: 'failmsg',//验证失败时文字信息的样式
    prefix: ':',
    separator: ';',
    reset_defer_timeout: 100
}
//验证类型及弹出信息设置
Vanadium.Type = function(className, validationFunction, error_message, message, init) {
  this.initialize(className, validationFunction, error_message, message, init);
};
Vanadium.Type.prototype = {
  initialize: function(className, validationFunction, error_message, message, init) {
    this.className = className;
    this.message = message;
    this.error_message = error_message;
    this.validationFunction = validationFunction;
    this.init = init;
  },
  test: function(value) {
    return this.validationFunction.call(this, value);
  },
  validMessage: function() {
    return this.message;
  },
  invalidMessage: function() {
    return this.error_message;
  },
  toString: function() {
    return "className:" + this.className + " message:" + this.message + " error_message:" + this.error_message
  },
  init: function(parameter) {
    if (this.init) {
      this.init(parameter);
    }
  }
};
Vanadium.setupValidatorTypes = function() {
Vanadium.addValidatorType('empty', function(v) {
    return  ((v == null) || (v.length == 0));
  });
//***************************************以下为验证方法,使用时可仅保留用到的判断
Vanadium.addValidatorTypes([
	//匹配大小写的等值
    ['equal', function(v, p) {
      return v == p;
    }, function (_v, p) {
      return '输入的值必须与<span class="' + Vanadium.config.message_value_class + '">' + p + '相符\(区分大小写\)</span>.'
    }],
    //不匹配大小写的等值
    ['equal_ignore_case', function(v, p) {
      return v.toLowerCase() == p.toLowerCase();
    }, function (_v, p) {
      return '输入的值必须与<span class="' + Vanadium.config.message_value_class + '">' + p + '相符\(不区分大小写\)</span>.'
    }],
    //是否为空
    ['required', function(v) {
      return !Vanadium.validators_types['empty'].test(v);
    }, '此项不可为空!'],
    //强制选中 
    ['accept', function(v, _p, e) {
      return e.element.checked;
    }, '必须接受!'],
    //
    ['integer', function(v) {
      if (Vanadium.validators_types['empty'].test(v)) return true;
      var f = parseFloat(v);
      return (!isNaN(f) && f.toString() == v && Math.round(f) == f);
    }, '请输入一个正确的整数值.'],
    //数字
    ['number', function(v) {
      return Vanadium.validators_types['empty'].test(v) || (!isNaN(v) && !/^\s+$/.test(v));
    }, '请输入一个正确的数字.'],
    //
    ['digits', function(v) {
      return Vanadium.validators_types['empty'].test(v) || !/[^\d]/.test(v);
    }, '请输入一个非负整数,含0.'],
    //只能输入英文字母
    ['alpha', function (v) {
      return Vanadium.validators_types['empty'].test(v) || /^[a-zA-Z\u00C0-\u00FF\u0100-\u017E\u0391-\u03D6]+$/.test(v)   //% C0 - FF (? - ?); 100 - 17E (? - ?); 391 - 3D6 (? - ?)
    }, '请输入英文字母.'],
    //仅限ASCII编码模式下输入英文字母
    ['asciialpha', function (v) {
      return Vanadium.validators_types['empty'].test(v) || /^[a-zA-Z]+$/.test(v)   //% C0 - FF (? - ?); 100 - 17E (? - ?); 391 - 3D6 (? - ?)
    }, '请在ASCII下输入英文字母.'],
	//英文字母或正数
    ['alphanum', function(v) {
      return Vanadium.validators_types['empty'].test(v) || !/\W/.test(v)
    }, '请输入英文字母或正数.'],
	//邮箱验证
    ['email', function (v) {
      return (Vanadium.validators_types['empty'].test(v) || /\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(v))
    }, '邮箱格式不正确,请检查.正确格式例如mrthink@gmail.com'],
    //网址
    ['url', function (v) {
      return Vanadium.validators_types['empty'].test(v) || /^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i.test(v)
    }, '请输入正确的网址,比如:http://www.whldcy.com'],
    //日期格式
    ['date_au', function(v) {
      if (Vanadium.validators_types['empty'].test(v)) return true;
      var regex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
      if (!regex.test(v)) return false;
      var d = new Date(v.replace(regex, '$2/$1/$3'));
      return ( parseInt(RegExp.$2, 10) == (1 + d.getMonth()) ) && (parseInt(RegExp.$1, 10) == d.getDate()) && (parseInt(RegExp.$3, 10) == d.getFullYear() );
    }, '请输入正确的日期格式,比如:28/05/2010.'],
    //输入固定长度字符串
    ['length',
      function (v, p) {
        if (p === undefined) {
          return true
        } else {
          return v.length == parseInt(p)
        }
        ;
      },
      function (_v, p) {
        return '输入字符长度等于<span class="' + Vanadium.config.message_value_class + '">' + p + '</span>个.'
      }
    ],
    //
    ['min_length',
      function (v, p) {
        if (p === undefined) {
          return true
        } else {
          return v.length >= parseInt(p)
        }
        ;
      },
      function (_v, p) {
        return '输入字符长度不低于<span class="' + Vanadium.config.message_value_class + '">' + p + '</span>个.'
      }
    ],
    ['max_length',
      function (v, p) {
        if (p === undefined) {
          return true
        } else {
          return v.length <= parseInt(p)
        }
        ;
      },
      function (_v, p) {
        return '输入字符长度不大于<span class="' + Vanadium.config.message_value_class + '">' + p + '</span>个.'
      }
    ],
	//判断密码是相同
    ['same_as',
      function (v, p) {
        if (p === undefined) {
          return true
        } else {
          var exemplar = document.getElementById(p);
          if (exemplar)
            return v == exemplar.value;
          else
            return false;
        }
        ;
      },
      function (_v, p) {
        var exemplar = document.getElementById(p);
        if (exemplar)
          return '两次密码输入不相同.';
        else
          return '没有可参考值!'
      },
      "",
      function(validation_instance) {
        var exemplar = document.getElementById(validation_instance.param);
        if (exemplar){
          jQuery(exemplar).bind('validate', function(){
            jQuery(validation_instance.element).trigger('validate');
          });
        }
      }
    ],
	//ajax判断是否存在值
    ['ajax',
      function (v, p, validation_instance, decoration_context, decoration_callback) {
        if (Vanadium.validators_types['empty'].test(v)) return true;
        if (decoration_context && decoration_callback) {
          jQuery.getJSON(p, {value: v, id: validation_instance.element.id}, function(data) {
            decoration_callback.apply(decoration_context, [[data], true]);
          });
        }
        return true;
      }]
    ,
	//正则匹配,此用法不甚理解
    ['format',
      function(v, p) {
        var params = p.match(/^\/(((\\\/)|[^\/])*)\/(((\\\/)|[^\/])*)$/);        
        if (params.length == 7) {
          var pattern = params[1];
          var attributes = params[4];
          try
          {
            var exp = new RegExp(pattern, attributes);
            return exp.test(v);
          }
          catch(err)
          {
            return false
          }
        } else {
          return false
        }
      },
      function (_v, p) {
        var params = p.split('/');
        if (params.length == 3 && params[0] == "") {
          return '输入的值必须与 <span class="' + Vanadium.config.message_value_class + '">' + p.toString() + '</span> 相匹配.';
        } else {
          return '提供的值与<span class="' + Vanadium.config.message_value_class + '">' + p.toString() + '</span>不匹配.';
        }
      }
    ]
  ])
  if (typeof(VanadiumCustomValidationTypes) !== "undefined" && VanadiumCustomValidationTypes) Vanadium.addValidatorTypes(VanadiumCustomValidationTypes);
};