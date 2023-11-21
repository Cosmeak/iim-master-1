//
//  BookListViewModel.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class BooksViewModel: ObservableObject {
    @Published var showingNewBookView: Bool = false
    @Published var books: [Book]
    
    init() {
        self.books = []
    }
    
    func removeBook(_ book: Book) {
        // 
    }
}
