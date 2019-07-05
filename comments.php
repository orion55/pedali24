					<?php if (post_password_required()) { ?>

						<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'ninjatheme' ); ?></p>

					<?php } else { ?>

						<?php if (have_comments()) : ?>

							<div id="comments" class="article_comments">
								<h2 class="subtitle">Комментарии (<?php comments_number('0', '1', '%'); ?>)</h2>
								<ul>
									<?php wp_list_comments('type=comment&callback=ninjathemecomments'); ?>
								</ul>
							</div> <!-- /.article_comments -->

						<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

							<p><?php _e( 'Comments are closed here.', 'ninjatheme' ); ?></p>

						<?php endif; ?>

						<?php

						$defaults = array(
							'fields'               => array(
														'author' => '<div class="field"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="Ваше имя *" /></div>',
														'email'  => '<div class="field"><input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' placeholder="Ваш E-mail *" /></div>',
													),
							'comment_field'        => '<div class="fields_wrp"><div class="field_message"><textarea id="comment" name="comment" aria-required="true" required="required" placeholder="Текст комментария *"></textarea></div>',
							'comment_notes_before' => '<p class="comment-notes"><em id="email-notes">' . __( 'E-mail не публикуется. Поля, отмеченные <span class="red">*</span>, обязательны для заполнения!' ) . '</em>'. ( $req ? $required_text : '' ) . '</p>',
							'comment_notes_after'  => '',
							'id_form'              => 'commentform',
							'id_submit'            => 'submit',
							'class_form'           => 'comment-form',
							'class_submit'         => 'submit',
							'name_submit'          => 'submit',
							'title_reply'          => __( 'Leave a Reply' ),
							'title_reply_to'       => __( 'Leave a Reply to %s' ),
							'title_reply_before'   => '<h2 id="reply-title" class="subtitle">',
							'title_reply_after'    => '</h2>',
							'cancel_reply_before'  => '<small>',
							'cancel_reply_after'   => '</small>',
							'cancel_reply_link'    => __( 'Cancel reply' ),
							'label_submit'         => __( 'Отправить' ),
							'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
							'submit_field'         => '<div class="field">%1$s %2$s</div></div>',
							'format'               => 'xhtml',
						);

						comment_form( $defaults ); ?>

					<?php } ?>