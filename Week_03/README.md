### 1.分治
#### 1.1 分治思想:
- 也是一种递归
- 把一个问题分成多个子问题，分别解决
- 把多个子问题的结果合并为最后结果
#### 1.2 代码模板:
```php
function devide_conquer($problem,$param1,$param2,...) {
    //recursion terminator
    if (empty($probliem)){
        print_result;
        return;
    }
    
    //prepare data
    $data = prepare_data($problem);
    $subproblems = split_problem($problem,$data); //分成多个子问题
    
    //conquer subproblems //分别解决子问题
    $subresult1 = devide_conquer($subproblems[0],$param1,$param2,...);
    $subresult2 = devide_conquer($subproblems[1],$param1,$param2,...);
    $subresult3 = devide_conquer($subproblems[2],$param1,$param2,...);
    ...
    
    //process and generate the final result //合并子问题结果
    $result = process_subresult($subresult1,$subresult2,$subresult3,...);

    //revert the current level states 
}
```

### 2. 回溯
#### 2.1 回溯思想
- 也是一种递归
- 每次递归后回置状态
- 一般用于子集、全排列等
#### 2.2 代码模板同递归,注意最后的revert states
```php
    function recursion($ans,$nums,$list,$index){
        //terminator 
        if($index >= count($nums)) {
            $ans[] = $list;
            return;
        }
        
        //process logic, drill down
        //未选择当前$index数时
        recursion($ans,$nums,$list,$index+1);
        //选择当前$index数时
        $list[] = $nums[$index]; 
        recurstion($ans,$nums,$list,$index+1);
        
        //revert states
        remove($list[count($list)-1]);//重置$list
        
    }
```