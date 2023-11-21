//
//  BookViewModel.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class NewBookViewModel: ObservableObject {
    @Published var title = ""
    @Published var author = ""
    @Published var readDate = Date()
    
    init() {}
    
    func createNewBook() -> Book {
        let book = Book(title: self.title, author: self.author, readDate: self.readDate)
        return book
    }
}

