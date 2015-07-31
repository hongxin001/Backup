// 初始化并创建一个大小为400x490px的游戏
var game = new Phaser.Game(400, 550, Phaser.AUTO, 'game_div');
var game_state = {};

// main()主函数
game_state.main = function() { };  
game_state.main.prototype = {

    preload: function() { 
        // 背景色
        this.game.stage.backgroundColor = '#71c5cf';

        // 加载鸟的图片
        this.game.load.image('bird', 'img/bird.png');  

        // 加载管道图片
        this.game.load.image('pipe', 'img/pipe.png');      
    },

    // 在preload之后建立游戏 
    create: function() { 
        // 添加鸟到屏幕上
        this.bird = this.game.add.sprite(100, 245, 'bird');
        
        // 重力效果
        this.bird.body.gravity.y = 1000; 

        // 键盘响应
        var space_key = this.game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);
        space_key.onDown.add(this.jump, this); 

        // 创建添加足够的管道(>=12)
        this.pipes = game.add.group();
        this.pipes.createMultiple(12, 'pipe');  

        // 每1500ms出现一列管道
        this.timer = this.game.time.events.loop(1500, this.add_row_of_pipes, this);           

        // 分数显示
        this.score = 0;
        var style = { font: "30px Arial", fill: "#ffffff" };
        this.label_score = this.game.add.text(20, 20, "0", style);  
    },

    // 检查小鸟是否存活
    update: function() {
        // 如果出界，重新开始
        if (this.bird.inWorld == false)
            this.restart_game(); 

        // 如果碰撞，重新开始
        this.game.physics.overlap(this.bird, this.pipes, this.restart_game, null, this);      
    },

    // 跳跃函数
    jump: function() {
        // Add a vertical velocity to the bird
        this.bird.body.velocity.y = -350;
    },

    // 重新开始
    restart_game: function() {
        // 初始化timer
        this.game.time.events.remove(this.timer);

        // 从main初始化
        this.game.state.start('main');
    },

    // 添加一个管道
    add_one_pipe: function(x, y) {
        // 获取第一个出界的管道坐标
        var pipe = this.pipes.getFirstDead();

        // 重新设定管道位置
        pipe.reset(x, y);

         // 管道向左的移动速度
        pipe.body.velocity.x = -200; 
               
        // kill出界管道
        pipe.outOfBoundsKill = true;
    },

    // 创建6个为一列的管道 在中部出现通道
    add_row_of_pipes: function() {
        var hole = Math.floor(Math.random()*5)+1;
        
        for (var i = 0; i < 9; i++)
            if (i != hole && i != hole +1&& i != hole +2) 
                this.add_one_pipe(400, i*60+10);   
    
        this.score += 1;
        this.label_score.content = this.score-1;  
    },
};

// 添加并开始'main'  开始游戏
game.state.add('main', game_state.main);  
game.state.start('main'); 