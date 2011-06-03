<div id="stream">
	<p><?php echo $this->view()->render(array('element' => 'foo'), array('message' => $message)); ?></p>
</div>

<a href="/posts/foo" data-remote="true" rel="no-follow">Click me</a>