var rolesArr = [
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "NEW_CLIENT_ENTRY",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "CLIENT_BASIC_DATA_UPDATE",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "BULK_CLIENT_ENTRY",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "BULK_CLIENT_DATA_ENTRY",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "NEW_CLIENT_DATA_ENTRY",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "MAYBE",
        manager: "MAYBE",
        name: "CLIENT_DATA_UPDATE",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "no",
        manager: "MAYBE",
        name: "GIVE_ACCESS_CLIENT_DATA",
    },
    {
        admin: "YES",
        employee: "MAYBE",
        frontdesk: "MAYBE",
        manager: "MAYBE",
        name: "CLIENT_DATA_SEARCH",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "TAKING_JOB_FROM_CLIENT",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "YES",
        name: "JOB_ALLOCATION_TO_EMPLOYEE",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "YES",
        name: "JOB_AUDIT_CHECKING_ALLOCATION",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "MAYBE",
        manager: "MAYBE",
        name: "STAFF_CREATION",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "MAYBE",
        manager: "MAYBE",
        name: "STAFF_DATA_UPDATE",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "MAYBE",
        manager: "MAYBE",
        name: "STAFF_DATA_SEARCH",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "ENABLE_DISABLE_STAFF",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "SEARCH_ASSIGNED_WORKS",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "NEW_ENQUIRY_CRAETION",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "SEARCH_ENQUIRY",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "NEW_JOB_CATEGORY_CREATION",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "DELETE_JOB_CATEGORY",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "EDIT_JOB_CATEGORY",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "JOB_TITLE_CREATION",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "UPDATE_JOB_TITLE",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "NO",
        manager: "NO",
        name: "DELETE_JOB_TITLE",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "BOOK_APPOINTMENTS",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "CANCEL_APPOINTMENTS",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "INVOICE_CREATION",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "EDIT_INVOICE",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "DELETE_INVOICE",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "YES",
        manager: "YES",
        name: "TAKING_CASH_PAYMENT_FROM_CLIENTS",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "MAYBE",
        manager: "YES",
        name: "WORK_STATUS_SEARCH",
    },
    {
        admin: "YES",
        employee: "NO",
        frontdesk: "MAYBE",
        manager: "MAYBE",
        name: "REPORTS",
    },
];

var Roles = [];

rolesArr.forEach(function (d) {
    if (String(d.admin).toLowerCase() != "no") {
        Roles.push({
            role: d.name,
            for: "Admin",
        });
    }
    if (String(d.manager).toLowerCase() != "no") {
        Roles.push({
            role: d.name,
            for: "Manager",
        });
    }
    if (String(d.frontdesk).toLowerCase() != "no") {
        Roles.push({
            role: d.name,
            for: "FrontDesk",
        });
    }
    if (String(d.employee).toLowerCase() != "no") {
        Roles.push({
            role: d.name,
            for: "Employee",
        });
    }
});
var indexer = {
    Admin: 5,
    Manager: 4,
    FrontDesk: 3,
    Employee: 2,
};
// console.log(JSON.stringify(Roles,null,2));
var RoleConstants = Roles.sort(function (a, b) {
    return indexer[b.for] - indexer[a.for];
})
    .map(function (d) {
        return `public const ${d.for.toUpperCase()}_ROLE_${d.role} = "${d.role}";`;
    })
    // .sort()
    .join("\n");

console.log(RoleConstants);
