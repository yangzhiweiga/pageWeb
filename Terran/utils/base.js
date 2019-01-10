import {Config} from 'config.js';
class Base
{
  constructor(){
    this.baseRestUrl = Config.restUrl;
  }

  request(params){
    var thar = this;
    var url=this.baseRestUrl+params.url;
    if(!params.type){
      params.type='get';
    }

    if(params.setUpUrl==false){
      url = params.url;
    } 

    console.log(params);
    wx.request({
      url:url,
      data:params.data,
      method:params.type,
      header:{
        'content-type':'application/json',
      },
      success:function(res){
        params.sCallback && params.sCallback(res.data);
      },
      fail:function(err){
        console.log(err);
      }
    });
  }

  getDataSet(event,key){
    return event.currentTarget.dataset[key];
  }
}

export {Base};