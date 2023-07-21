![Screenshot](https://github.com/Buildbox-ItSolutions/wordpress-developer-challenge/blob/main/wp-content/themes/desafio-wp/screenshot.png?raw=true)

# Desafio Buildbox - Play: Tema Wordpress

Olá! Seja bem-vindo(a) ao desafio WordPress da Buildbox.

Nosso objetivo é validar seus conhecimentos avançados em desenvolvimento com WordPress, além de habilidades com front-end.

Estamos à procura de alguém que vá além de customizar temas prontos. Nossos projetos são criados de acordo com as necessidades de cada cliente, então o desafio é **criar um tema WordPress do zero**.

Você tem 7 (sete) dias até a entrega final. Use todo este tempo para mostrar o seu melhor.

## Descrição do tema

Você irá construir um tema WordPress para uma plataforma fictícia de vídeos chamada “Play”.  
Você precisa criar front-end e back-end com fidelidade ao design e às funcionalidades propostas e que seja responsivo e performático.

O tema deve ter no mínimo 3 templates diferentes:

-  **Home**: contendo o último vídeo publicado em destaque; e carrosséis horizontais para cada termo na taxonomia criada.
-  **Arquivo**: página de arquivo da taxonomia, que exibe todos os vídeos na mesma.
-  **Single**: página de detalhe de um vídeo e embed do YouTube.

Nestes links você encontra o protótipo com mais detalhes, na versão [Desktop](https://xd.adobe.com/view/4ef93bf1-8b2a-4d9f-8dc1-38bb056538ff-1baa/specs) e [Mobile](https://xd.adobe.com/view/736a1c45-d953-4fda-9e02-3c86d2a0047b-2639/specs).

### Pré-requisitos

-  Criar um custom post type para os vídeos, registrada como `video`;
-  Criar uma taxonomia customizada para segmentar os vídeos (`video_type`) em 3 diferentes termos: Filmes, Documentários e Séries;
-  Todo o conteúdo deve ser carregado dinamicamente, como Título, Imagem de Capa, Descrição, Tempo de Duração, Sinopse e Embed de Vídeo.
   -  Todas essas informações devem ser editáveis na edição do post do vídeo no painel administrativo;
   -  Conteúdo estático (hard coded) será desconsiderado.
   -  Tempo de Duração: número (registrado como `bx_play_video_duration`)
   -  Embed de Vídeo: URL do YouTube (registrado como `bx_play_video_ID`).
-  **IMPORTANTE**: Não altere a estrutura de pastas. Lembre-se de preencher seu nome em `style.css`.

### Diferenciais

-  Uso de SASS ou Tailwind.
-  Uso de boas práticas em todas as linguagens utilizadas.
-  Organização dos arquivos.

### Plugins permitidos

-  [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
-  [Custom Post Type UI](https://br.wordpress.org/plugins/custom-post-type-ui/)

Se forem utilizados, as configurações devem ser exportadas para código PHP e adicionadas ao código do tema.

Não vamos considerar nenhuma configuração que venha do painel do WordPress.

## Como enviar

Para submeter a resposta deste desafio, você deve fazer uma cópia **privada** deste repositório, usando a opção template.  
Com seu tema concluído e submetido, convide `wp@buildbox.com.br` como colaborador do seu fork, preencha e envie [este formulário](https://forms.clickup.com/f/xf5uw-4783/9X2E01YKFQB8UXNM03).  
Nele você colocará suas informações de identificação.  
Após isto, nós vamos instalar e avaliar seu tema.

Obrigado.  
Mãos à obra e boa sorte!
