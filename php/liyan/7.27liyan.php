<?php
#7.27 [234. 回文链表] liyan
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    public function isPalindrome($head) {

        if ($head == null) return true;

        $firstHalfEnd = $this->endOfFirstHalf($head);
        $secondHalfStart = $this->reverseList($firstHalfEnd->next);

        $p1 =$head;
        $p2 = $secondHalfStart;
        $result = true;
        while ($result && $p2 != null) {
            if ($p1->val != $p2->val) $result = false;
            $p1 = $p1->next;
            $p2 = $p2->next;
        }

        $firstHalfEnd->next = $this->reverseList($secondHalfStart);
        return $result;
    }
    function reverseList($head) {
        $prev = null;
        while($head != null){
            $temp = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $temp;
        }
        return $prev;

    }

    function  endOfFirstHalf($head) {
        $fast = $head;
        $slow = $head;
        while ($fast->next != null && $fast->next->next != null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        return $slow;
    }
}