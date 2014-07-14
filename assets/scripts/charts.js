//var data1 =[[1,232],[2,53],[3,77],[4,106],[5,210]];
var Charts = function () {

    return {
        //main function to initiate the module

        init: function () {

            App.addResponsiveHandler(function () {
                 Charts.initBarCharts(); 
            });
            
        },

        initBarCharts: function () {

            // bar chart:
            
         
            var options = {
                    series:{bars:{show: true}},
                    bars:{barWidth:0.5},            
                    grid:{backgroundColor: { colors: ["#fafafa", "#35aa47"] }}
            };
            $.plot($("#chart_1_1"), [data1], options);

            // horizontal bar chart:

            //var data1 = [[10, 10], [20, 20], [30, 30], [40, 40], [50, 50]];
         
            var options = {
                    series:{
                        bars:{show: true}
                    },
                    bars:{
                        horizontal:true,
                        barWidth:0.5
                    },
                    grid:{
                        backgroundColor: { colors: ["#fafafa", "#4b8df8"] }
                    }
            };
         
            $.plot($("#chart_1_2"), [data1], options);  
        }

        
        
    };

}();