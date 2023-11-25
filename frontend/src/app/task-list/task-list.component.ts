import { Component, OnInit } from '@angular/core';
import { TodoService } from '../todo.service';


@Component({
  selector: 'app-task-list',
  templateUrl: './task-list.component.html',
  styleUrls: ['./task-list.component.css']
})
export class TaskListComponent implements OnInit {
  tasks: any[] = [];

  constructor(private todoService: TodoService) { }

  ngOnInit(): void {
    this.getTasks();
  }

  getTasks() {
    this.todoService.getTasks().subscribe(
      (response: any) => {
        this.tasks = response.tasks;
      },
      (error) => {
        console.error(error);
      }
    );
  }
}

