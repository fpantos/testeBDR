/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  fpant
 * Created: 14-Mar-2016
 */

CREATE TABLE `testeDBR`.`tarefas` 
( 
id INT PRIMARY KEY AUTO_INCREMENT, 
titulo VARCHAR(255) NOT NULL , 
descricao VARCHAR(255) NOT NULL , 
prioridade INT NOT NULL 
)