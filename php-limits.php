<?php
// Arquivo para aumentar os limites do PHP especificamente para o WordPress
// Este arquivo deve ser incluído no wp-config.php ou carregado automaticamente

// Aumentar limite de variáveis de entrada
@ini_set('max_input_vars', 5000);
@ini_set('suhosin.post.max_vars', 5000);
@ini_set('suhosin.request.max_vars', 5000);

// Aumentar limite de upload e POST
@ini_set('upload_max_filesize', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', 300);
@ini_set('max_input_time', 300);

// Aumentar memória
@ini_set('memory_limit', '256M');

// Log para debug - verificar se os limites foram aplicados
error_log('PHP Limits definidos:');
error_log('max_input_vars: ' . ini_get('max_input_vars'));
error_log('post_max_size: ' . ini_get('post_max_size'));
error_log('memory_limit: ' . ini_get('memory_limit'));
