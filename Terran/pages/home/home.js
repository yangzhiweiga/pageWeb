import {Home} from 'home-model.js';
var home = new Home();
Page({
  data:{

  },
  onLoad:function(){
    this._loadData();
  },
  _loadData:function(callback){
    var that = this;
    home.getBannerData((data)=>{
      that.setData({
        bannerArr:data
      });
    });

    home.getThemeData((data)=>{
      that.setData({
        themeArr:data
      });
    });

    home.getProductorData((data)=>{
        that.setData({
          productsArr:data
        });
    });
  },
  onProductsItemTap:function(event){
    var id = event.currentTarget.dataset['id'];
    wx.navigateTo({
      url: '../product/product?id='+id,
    })
  },
  onThemesItemTap:function(event){
    var id = home.getDataSet(event,'id');
    var name = home.getDataSet(event,'name');
    wx.navigateTo({
      url:'../theme/theme?id='+id+'&name='+name,
    })
  }
})