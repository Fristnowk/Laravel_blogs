<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>个人博客</title>
        <link rel="stylesheet" href="{{URL::asset('css/blog.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <h2>Little Blog</h2>
                <form action="/blog/search" method="get">
					<input type="text" name="keyword">
					<input type="submit" value="搜索">
				</form>
				<p id="account">
					@if(session()->exists("account"))
					<a href="/user/loginoff">{{session()->get("account")}}</a>
					@else
					<a href="/login">未登录</a>
					@endif
				</p>
			</nav>
		</header>
		<aside>
			@if(isset($blogs))
			<ul>
				@foreach($blogs as $b)
				<li>{{$b->title}}</li>
				@endforeach
			</ul>
			@endif
		</aside>
		<section>
			<form action="{{isset($blog) ? '/blog/mod' : '/blog/add'}}" method="post">
				<div>
					{!!csrf_field()!!}
					<input type="hidden" name="bid" value="{{isset($blog) ? $blog->id : 0}}">
					<input type="text" name="title" placeholder="博客标题" value="{{isset($blog) ? $blog->title : ''}}">
					<textarea name="content" rows="5" placeholder="博客内容">{{isset($blog) ? $blog->content : ''}}</textarea>
				</div>
				<input type="submit" value="{{isset($blog) ? '更新' : '发布'}}">
			</form>
		</section>
		<section>
			@if(isset($blogs))
			@foreach($blogs as $b)
			<article>
				<div class="b-t">
					<h3>{{$b->title}}</h3>
					<div class="act">
						<a href="/blog/del/{{$b->id}}"><button>删除</button></a>
						<a href="/blog/mod/{{$b->id}}"><button>修改</button></a>
					</div>
				</div>
				<p id="b-c">{{$b->content}}</p>
			</article>
			@endforeach
			@endif
		</section>
		<!-- <form action="/blog/search" method="get">
			<input type="text" name="keyword">
			<input type="submit" value="搜索">
		</form> -->
    </body>
</html>