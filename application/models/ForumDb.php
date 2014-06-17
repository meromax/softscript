<?php

class ForumDb
{
    const FORUM_TABLE = 'forum';
    const FORUM_PER_PAGE  = 20;

    const FORUM_COMMENTS_TABLE = 'forum_comments';
    const FORUM_COMMENTS_PER_PAGE  = 10;
    
    protected $db;
    
    
        
    public function __construct(){
        $this -> db = Zend_Registry::get('db');
    }

    public function getForumTopicsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::FORUM_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::FORUM_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getForumTopicsForPageFront($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::FORUM_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::FORUM_TABLE.' WHERE lang_id='.$lang_id.' AND active=1 ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getForumTopicsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::FORUM_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::FORUM_PER_PAGE);
    }

    public function getForumTopicsPagesCountFront($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::FORUM_TABLE.' WHERE lang_id='.$lang_id.' AND active=1');
        return ceil($count['count']/self::FORUM_PER_PAGE);
    }

    public function getForumTopicById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::FORUM_TABLE.' WHERE id = ?', $id);
    }

    public function addForum($data) {
        $dataArray = array(
            'title'             => $data['title'],
            'description_short' => $data['description_short'],
            'description'       => $data['description'],
            'meta_title'        => $data['meta_title'],
            'meta_description'  => $data['meta_description'],
            'meta_keywords'     => $data['meta_keywords'],
            'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::FORUM_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function modifyForum($data) {
        $dataArray = array(
            'title'             => $data['title'],
            'description_short' => $data['description_short'],
            'description'       => $data['description'],
            'meta_title'        => $data['meta_title'],
            'meta_description'  => $data['meta_description'],
            'meta_keywords'     => $data['meta_keywords'],
            'lang_id'          => $data['lang_id']
        );
        $this -> db -> update(self::FORUM_TABLE, $dataArray, 'id = '.$data['id']);
    }

    public function deleteForum($id){
        $this -> db -> delete(self::FORUM_TABLE, 'id = '.$id);
    }

    public function changeForumActive($id){
        $this -> db -> query('UPDATE '.self::FORUM_TABLE.' SET `active` = NOT `active` WHERE id = ?', $id);
    }

    /************************************************************************************************/
    /************************************* COMMENTS *************************************************/
    /************************************************************************************************/

    public function getForumAnswers($id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::FORUM_COMMENTS_TABLE.' WHERE forum_id = ? AND active=1 ORDER BY post_date', $id);
    }

    public function getForumTopicCommentsForPage($forumId, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::FORUM_COMMENTS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::FORUM_COMMENTS_TABLE.' WHERE forum_id='.$forumId.' ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getForumTopicCommentsPagesCount($forumId, $lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::FORUM_COMMENTS_TABLE.' WHERE forum_id='.$forumId);
        return ceil($count['count']/self::FORUM_COMMENTS_PER_PAGE);
    }

    public function getForumComments($forumId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::FORUM_COMMENTS_TABLE.' WHERE forum_id = ? ORDER BY post_date DESC', $forumId);
    }

    public function changeCommentActive($id){
        $this -> db -> query('UPDATE '.self::FORUM_COMMENTS_TABLE.' SET `active` = NOT `active` WHERE id = ?', $id);
    }

    public function getForumCommentById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::FORUM_COMMENTS_TABLE.' WHERE id = ?', $id);
    }

    public function deleteComment($id){
        $this -> db -> delete(self::FORUM_COMMENTS_TABLE, 'id = '.$id);
    }
    public function deleteAllComments($id){
        $this -> db -> delete(self::FORUM_COMMENTS_TABLE, 'forum_id = '.$id);
    }

    public function addForumComment($data) {
        $dataArray = array(
            'description'      => $data['description'],
            'user_id'          => $data['user_id'],
            'username'         => $data['username'],
            'forum_id'         => $data['forum_id'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::FORUM_COMMENTS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }
}