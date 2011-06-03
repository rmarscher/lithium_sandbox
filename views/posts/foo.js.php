$('#stream').append(<?php echo json_encode(trim($this->view()->render(array('element' => 'foo'), array('message' => $message)))); ?>);
